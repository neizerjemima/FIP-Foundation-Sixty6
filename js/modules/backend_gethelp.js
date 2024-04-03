export function backend_gethelp() {
    const app = Vue.createApp({
        data() {
            return {
                name: '',
                email: '',
                subject: '',
                message: '',
                feedback: '*Please fill out all required fields'
            };
        },
        methods: {
            submitForm() {
                if (!this.name || !this.email || !this.subject || !this.message) {
                    this.feedback = "*Please verify that all fields have been filled in.";
                    return;
                }

                const url = "http://localhost/backend_fip/public/gethelps/add";
                const formData = new FormData(document.querySelector('#help-form'));

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
                        this.message = '';
                        this.feedback = "Thanks for reaching out. Help is on its way.";
                    }
                })
                .catch(error => {
                    console.error(error);
                    this.feedback = "Sorry, an error occurred while processing your request.";
                });
            }
        }
    });

    app.mount("#app");
}
