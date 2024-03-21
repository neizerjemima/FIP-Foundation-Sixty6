export function gethelp_lightbox(){  

    const lightboxes = document.querySelectorAll('.lightbox-help');
    const boxTextSliders = document.querySelectorAll('.box-text-slider');
    const closeButtons = document.querySelectorAll('.closeContent-help');



    function openLightBox(index) {
        lightboxes.forEach(lightbox => {
            if (lightbox.classList.contains(`light-box-${index}`)) {
                lightbox.style.display = "block";
                lightbox.classList.remove('hidden');

            }
        });
    }
    
    function closeLightBox(event) {
        event.preventDefault(); 
        const closeButton = event.target;
        const lightbox = closeButton.closest('.lightbox-help');
        if (lightbox) {
            lightbox.style.display = "none"; 
        }
    }

    boxTextSliders.forEach((boxTextSlider, index) => {
        boxTextSlider.addEventListener("click", () => {
            openLightBox(index + 1);
        });
    });

    closeButtons.forEach(close => {
        close.addEventListener("click", closeLightBox);
    });

}

