export function backend_volunteer() {
    const app = Vue.createApp({
        data() {
            return {
                formData: {
                    firstname: '',
                    lastname: '',
                    email: '',
                    phone: '',
                    role: '',
                    feedback: ''
                },
                roles: []
            };
        },
        mounted() {
            this.fetchRoles(); 
        },
        methods: {
            fetchRoles() {
                const url = "http://localhost/backend_fip/public/roles";
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        this.roles = data;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            },
            submitForm() {
                if (!this.formData.firstname || !this.formData.lastname || !this.formData.email || !this.formData.phone || !this.formData.role) {
                    this.formData.feedback = '*Please fill out all required fields';
                    return;
                }

                const url = "http://localhost/backend_fip/public/volunteers/add";
                const formData = new FormData();
                formData.append('firstname', this.formData.firstname);
                formData.append('lastname', this.formData.lastname);
                formData.append('email', this.formData.email);
                formData.append('phone', this.formData.phone);
                formData.append('role', this.formData.role);

                fetch(url, {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(responseText => {
                    console.log(responseText);
                    this.formData.feedback = '';

                    if (responseText.errors) {
                        responseText.errors.forEach(error => {
                            this.formData.feedback += error + '<br>';
                        });
                    } else {
                        this.formData.firstname = '';
                        this.formData.lastname = '';
                        this.formData.email = '';
                        this.formData.phone = '';
                        this.formData.role = '';
                        this.formData.feedback = responseText.message;

                        // Show the lightbox
                        const lightBoxVolunteer = document.querySelector("#volunteer-lightbox")
                        const volunteerBox = document.querySelector("#volunteer-form-box")
                        const volunteerBoxReceived = document.querySelector("#response-form-volunteer")

                        volunteerBox.classList.add('hidden');
                        volunteerBox.style.display = "none"; 
                        lightBoxVolunteer.style.backgroundColor ="#7A2A85";
                        volunteerBoxReceived.classList.remove("hidden");
                        volunteerBoxReceived.style.display = "block";
                        gsap.fromTo('#response-form-volunteer', {
                            y: 35,
                            opacity: 0,
                          },
                          {
                          delay: 0.5, 
                          duration: 1, 
                          y: 0,
                          opacity: 1,
                          ease: 'power2.easeOut',
                          stagger: {
                            from: 'start', 
                            amount: 0.5, 
                          },
                        });
                    }
                })
                .catch(error => {
                    console.error(error);
                    this.formData.feedback = "Sorry, an error occurred while processing your request.";
                });
            }
        }
    });

    const vm = app.mount("#volunteer-lightbox");
}
