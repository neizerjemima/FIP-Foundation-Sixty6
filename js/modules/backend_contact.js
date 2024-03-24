export function backend_contact() {
    const contact = Vue.createApp({
        data() {
            return {
                name: '',
                email: '',
                subject: '',
                textinput: '',
                feedback: '*Please fill out all required fields'
            };
        },
        methods: {
            submitForm() {
                if (!this.name || !this.email || !this.subject || !this.textinput) {
                    this.feedback = '*Please ensure all required fields are filled out';
                    return; 
                }

                const url = "http://localhost/backend_fip/public/contacts/add";
                const formData = new FormData(document.querySelector('#contacts-form'));

                fetch(url, {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(responseText => {
                    console.log(responseText);
                    this.feedback = ''; 

                    if (responseText.errors) {
                        responseText.errors.forEach(error => {
                            this.feedback += error + "<br>";
                        });
                    } else {
                        this.name = '';
                        this.email = '';
                        this.subject = '';
                        this.textinput = '';
                        this.feedback = responseText.message;
                    }
                })
                .catch(error => {
                    console.error(error);
                    this.feedback = "Sorry, an error occurred while processing your request.";
                });
            }
        }
    });

    contact.mount("#app");
}




