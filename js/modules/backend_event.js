export function backend_event(){  
    const event = Vue.createApp({
        created() {
            console.log("created lifecycle hook called");
            fetch("http://localhost/backend_fip/public/events")
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    this.eventsData = data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
    
        data() {
            return {
                eventsData: [],
                error: ""
            };
        },
    
        methods: {
            handleButtonClick(event) {
                const buttonId = event.currentTarget.id;
                const eventId = buttonId.split('-')[1];
                const eventData = this.eventsData.find(event => event.id === parseInt(eventId));
    
                if (eventData) {
                    const lightboxContent = document.querySelector('.content-lightbox');
                    if (lightboxContent) {
                        lightboxContent.innerHTML = `
                            <div>
                                <img src="images/${eventData.photo}" alt="${eventData.title}" class="image-lightbox-event">
                            </div>
                            <div class="text-lightbox-event">
                            <p><span class="heading-text-event">${eventData.title}</span></p>
                            <p><span class="date-event">${eventData.date}</span></p>
                            <p><span class="about-event">${eventData.description}</span></p>
                            </div>
                        `;
                        const lightbox = document.querySelector('#eventsReveal');
                        lightbox.classList.remove('hidden');

                        const closeContent = document.querySelector(".closeContent");

                        function hideModel(event) {
                            event.preventDefault();
                            lightbox.classList.add('hidden');
                          }

                        closeContent.addEventListener("click", hideModel);

                    } else {
                        console.error("Lightbox content not found");
                    }
                } else {
                    console.error("event not found");
                }
            },
        }
    });
    
    event.mount(".app");
}
