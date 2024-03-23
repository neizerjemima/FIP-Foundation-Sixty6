export function backend_contact() {
    const form = document.querySelector("#contacts-form");
    const feedback = document.querySelector("#feedback");

    function submitForm(event) {
        event.preventDefault();
        const url = "http://localhost/backend_fip/public/contacts/add";
        const formData = new FormData(form);

        fetch(url, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(responseText => {
            console.log(responseText);
            const feedback = document.querySelector("#feedback");
            feedback.innerHTML = "";

            if (responseText.errors) {
                responseText.errors.forEach(error => {
                    const errorElement = document.createElement("p");
                    errorElement.textContent = error;
                    feedback.appendChild(errorElement);
                });
            } else {
                form.reset();
                const messageElement = document.createElement("p");
                messageElement.textContent = responseText.message;
                feedback.appendChild(messageElement);
            }
        })
        .catch(error => {
            console.error(error);
            feedback.innerHTML = "<p>Sorry, an error occurred while processing your request.</p>";
        });
    }

    form.addEventListener("submit", submitForm);
}




