export function countdown(){  

    gsap.registerPlugin(ScrollTrigger);

    function animateCountdown(target, endValue) {
        gsap.to(target, {
            innerText: endValue,
            duration: 3,
            ease: "power1.out"
        });
    }

    function resetCountdownAnimations() {
        animateCountdown("#numberCount1", 0);
        animateCountdown("#numberCount2", 0);
        animateCountdown("#numberCount3", 0);
    }
    

     function replayCountdownAnimations() {
        animateCountdown("#numberCount1", 4000);
        animateCountdown("#numberCount2", 11);
        animateCountdown("#numberCount3", 200);
    }

    gsap.utils.toArray("#statistics").forEach(section => {
        ScrollTrigger.create({
            trigger: section,
            start: "top center",
            end: "bottom center",
            onEnter: replayCountdownAnimations, 
            onLeave: resetCountdownAnimations, 
            onEnterBack: replayCountdownAnimations, 
            onLeaveBack: resetCountdownAnimations 
        });
    });

}
