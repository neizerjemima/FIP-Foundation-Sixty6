gsap.registerPlugin(ScrollTrigger);

// Animation for the countdown statistics
function animateCountdown(target, endValue) {
    gsap.to(target, {
        innerText: endValue,
        duration: 3,
        ease: "power1.out"
    });
}

// ScrollTrigger to trigger animation when the "statistics" section enters the viewport
gsap.utils.toArray("#statistics").forEach(section => {
    ScrollTrigger.create({
        trigger: section,
        start: "top center",
        end: "bottom center",
        onEnter: () => {
            animateCountdown("#numberCount1", 4000);
            animateCountdown("#numberCount2", 11);
            animateCountdown("#numberCount3", 200);
        }
    });
});