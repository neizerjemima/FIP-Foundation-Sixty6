(() => {

    const donationButton = document.querySelectorAll(".donation-button")
    const donationLightBox = document.querySelector("#donation-lightbox")
    const donationButtonForm = document.querySelector("#donation-submit-button")
    const donationBoxForm = document.querySelector("#donation-form-box")
    const responseBoxFormDonation = document.querySelector("#response-form-donation")
    const closeDonation = document.querySelector("#closeContentDonation")
    const closeDonationReceived = document.querySelector("#closeContentDonationReceived")



    function showModelDonation(){

        donationLightBox.style.display = "block";
        donationLightBox.classList.remove("hidden");
        donationLightBox.style.backgroundColor ="#F7F0F0";

    }


    function showModelDonationReceived(event){
        event.preventDefault(); 
        donationBoxForm.style.display = "none";
        donationBoxForm.classList.add("hidden")
        donationLightBox.style.backgroundColor ="#7A2A85";

        responseBoxFormDonation.style.display = "block";
        responseBoxFormDonation.classList.remove("hidden")

    }

    function closeDonationBox(event){
        event.preventDefault(); 
        donationLightBox.style.display = "none";
        donationLightBox.classList.add("hidden");

    }

    function closeDonationBoxReceived(event){
        event.preventDefault(); 
        donationLightBox.style.display = "none";
        donationLightBox.classList.add("hidden");

        responseBoxFormDonation.style.display = "none";
        responseBoxFormDonation.classList.add("hidden")

        donationBoxForm.style.display = "flex";
        donationBoxForm.classList.remove("hidden")
    }


    donationButton.forEach(donation => {
        donation.addEventListener("click", showModelDonation);
    });


    donationButtonForm.addEventListener("click", showModelDonationReceived);

    closeDonation.addEventListener("click", closeDonationBox);
    closeDonationReceived.addEventListener("click", closeDonationBoxReceived);

})();