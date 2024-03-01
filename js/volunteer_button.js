(() => {

    const volunteerButton = document.querySelector("#volunteer-button")
    const lightBoxVolunteer = document.querySelector("#volunteer-lightbox")
    const closeVolunteer = document.querySelector("#closeContentGeneral")
    const volunteerBox = document.querySelector("#volunteer-form-box")
    const volunteerBoxReceived = document.querySelector("#response-form-volunteer")
    const volunteerButtonForm = document.querySelector("#volunteer-submit-button")
    const closeVolunteerReceived = document.querySelector("#closeContentGeneralReceived")



    function showModelVolunteer(){
        console.log("it is working");
        lightBoxVolunteer.style.display = "block";
        lightBoxVolunteer.classList.remove('hidden');
        volunteerBoxReceived.classList.add("hidden");
    }

    function closeVolunteerBox(event){
        event.preventDefault(); 
        lightBoxVolunteer.style.display = "none"; 
    }

    function closeVolunteerBoxReceived(event){
        event.preventDefault(); 
        lightBoxVolunteer.style.display = "none"; 
        volunteerBoxReceived.style.display = "none"; 
        volunteerBox.classList.remove("hidden") 
        volunteerBox.style.display = "block"; 
        lightBoxVolunteer.style.backgroundColor ="#F7F0F0";
    }



    function showResponseVolunteer(event){
        event.preventDefault(); 
        volunteerBox.classList.add('hidden');
        volunteerBox.style.display = "none"; 
        lightBoxVolunteer.style.backgroundColor ="#7A2A85";
        volunteerBoxReceived.classList.remove("hidden");
        volunteerBoxReceived.style.display = "block";
    }


    volunteerButton.addEventListener("click", showModelVolunteer);
    closeVolunteer.addEventListener("click", closeVolunteerBox);
    closeVolunteerReceived.addEventListener("click", closeVolunteerBoxReceived);

    volunteerButtonForm.addEventListener("click", showResponseVolunteer);

})();