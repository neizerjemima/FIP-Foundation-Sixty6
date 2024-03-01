(() => {
    
const dropDown = document.querySelector('.dropdown-select');
const tableContent = document.querySelectorAll('.email-volunteer, .phone-volunteer, .message-volunteer, .notes-volunteer');
const emails = document.querySelectorAll('.email-volunteer');
const phones = document.querySelectorAll('.phone-volunteer');
const messages =  document.querySelectorAll('.message-volunteer')
const notes = document.querySelectorAll('.notes-volunteer');

function valueDropDown(){
    var selectedValue = dropDown.value;

    tableContent.forEach((value) => {
        value.classList.add('hidden');
    })

    if (selectedValue === 'email-volunteer') {
        emails.forEach((email) => {
            email.classList.remove('hidden');
        })
    } else if (selectedValue === 'phone-volunteer') {
        phones.forEach((phone) => {
            phone.classList.remove('hidden');
        })
    } else if (selectedValue === 'message-volunteer') {
        messages.forEach((message) => {
            message.classList.remove('hidden');
        })
    } else if (selectedValue === 'notes-volunteer') {
        notes.forEach((note) => {
            note.classList.remove('hidden');
        })
    }
}


dropDown.addEventListener("change", valueDropDown);

})();

