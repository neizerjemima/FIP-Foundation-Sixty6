(() => {
const text_slider = document.querySelector("#text-slider");
const preBtn = document.querySelector("#prev-btn");
const nextBtn = document.querySelector("#next-btn");
let slideWidth = text_slider.clientWidth; 
let currentIndex = 0;

function showSlide(index) {
    let currentSlideWidth = slideWidth;
    if (window.innerWidth <= 768) {
        // 
        currentSlideWidth = slideWidth * 0.35; 
    } 

    const newTransformValue = -index * currentSlideWidth + "px";
    text_slider.style.transform = `translateX(${newTransformValue})`;
    console.log(newTransformValue);
}

    function nextSlide(){
        currentIndex++;
        if(currentIndex >= text_slider.children.length){
            currentIndex = 0;
        }
        showSlide(currentIndex);
    }


    function prevSlide(){
        currentIndex--;
        if(currentIndex <0){
            currentIndex = text_slider.children.length-1;
        }
        showSlide(currentIndex);
    }

    function updateSliderWith(){
        slideWidth = text_slider.clientWidth;
        showSlide(currentIndex);
    }

    preBtn.addEventListener("click", prevSlide);
    nextBtn.addEventListener("click", nextSlide);


    window.addEventListener("resize", updateSliderWith)

    updateSliderWith();
})();