(() => {
    const lightboxes = document.querySelectorAll('.lightbox-help');
    const boxTextSliders = document.querySelectorAll('.box-text-slider');
    const closeButtons = document.querySelectorAll('.closeContent-help');



    function openLightBox(index) {
        console.log(`Opening lightbox with index: ${index}`);
        lightboxes.forEach(lightbox => {
            console.log('Lightbox:', lightbox);
            console.log('Contains class:', lightbox.classList.contains(`light-box-${index}`));
            if (lightbox.classList.contains(`light-box-${index}`)) {
                console.log(`Removing hidden class from lightbox with index: ${index}`);
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
            console.log(`Clicked on box-text-slider with index: ${index}`);
            openLightBox(index + 1);
        });
    });

    closeButtons.forEach(close => {
        close.addEventListener("click", closeLightBox);
    });

})();

