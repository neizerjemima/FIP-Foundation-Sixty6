export function backend_donation() {
    const app = Vue.createApp({
        data() {
            return {
                formData: {
                    firstname: '',
                    lastname: '',
                    email: '',
                    amount: '',
                    type: '',
                    feedback: "*Please fill out all required fields"
                    
                },
                types: []
            };
        },
        mounted() {
            this.fetchDonations(); 
        },
        methods: {
            fetchDonations() {
                const url = "http://localhost/backend_fip/public/types";
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        this.types = data;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            },
            submitForm() {
                if (!this.formData.firstname || !this.formData.lastname || !this.formData.email || !this.formData.amount || !this.formData.type) {
                    this.formData.feedback = "*Please verify that all fields have been filled in.";
                    return;
                }

                const url = "http://localhost/backend_fip/public/donations/add";
                const formData = new FormData();
                formData.append("firstname", this.formData.firstname);
                formData.append("lastname", this.formData.lastname);
                formData.append("email", this.formData.email);
                formData.append("amount", this.formData.amount);
                formData.append("type", this.formData.type);

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
                            this.formData.feedback = error + "<br>";
                        });
                    } else {
                        this.formData.firstname = '';
                        this.formData.lastname = '';
                        this.formData.email = '';
                        this.formData.amount = '';
                        this.formData.type = '';

                        // Show the lightbox
                        const donationLightBox = document.querySelector("#donation-lightbox")
                        const donationBoxForm = document.querySelector("#donation-form-box")
                        const responseBoxFormDonation = document.querySelector("#response-form-donation")

                        donationBoxForm.style.display = "none";
                        donationBoxForm.classList.add("hidden")
                        donationLightBox.style.backgroundColor ="#7A2A85";
                        responseBoxFormDonation.style.display = "block";
                        responseBoxFormDonation.classList.remove("hidden")

                        gsap.fromTo('#response-form-donation', {
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

    app.mount("#donation-lightbox");
}