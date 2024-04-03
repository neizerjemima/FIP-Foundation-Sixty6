export function backend_newsletter() {
  const newsletter = Vue.createApp({
    data() {
      return {
        formData: {
          name: "",
          email: ""
        },
        feedback: "*Please fill out all required fields",
      };
    },
    methods: {
      submitForm() {
        if (!this.formData.name || !this.formData.email) {
          this.feedback = "*Please ensure all required fields are filled out";
          return;
        }

        const url = "http://localhost/backend_fip/public/newsletter/add";
        const formData = new FormData(document.querySelector("#newsletter-form"));

        fetch(url, {
          method: "POST",
          body: formData,
        })
          .then((response) => response.json())
          .then((responseText) => {
            console.log(responseText);
            this.feedback = "";

            if (responseText.errors) {
              responseText.errors.forEach((error) => {
                this.feedback += error + "<br>";
              });
            } else {
              this.formData.name = "";
              this.formData.email = "";
             this.feedback = "Thank you for signing up!";
            }
          })
          .catch((error) => {
            console.error(error);
            this.feedback =
              "Sorry, an error occurred while processing your request.";
          });
      },
    },
  });

  newsletter.mount("#insights");
}

