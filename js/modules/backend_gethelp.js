export function backend_gethelp() {
    const app = Vue.createApp({
        data() {
            return {
                name: '',
                email: '',
                subject: '',
                message: '',
                feedback: ''
            };
        },
        methods: {
            submitForm() {
                if (!this.name || !this.email || !this.subject || !this.message) {
                    this.feedback = '*Please fill out all required fields';
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
                            this.feedback += error + '<br>';
                        });
                    } else {
                        this.name = '';
                        this.email = '';
                        this.subject = '';
                        this.message = '';
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

    app.mount("#app");
}
