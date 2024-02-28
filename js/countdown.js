gsap.registerPlugin(ScrollTrigger);

gsap.to("#numberCount1", { innerText: 4000, duration: 3, 
        scrollTrigger: {
        trigger: "#numberCount1",
        start: "top center",
        end: "bottom center",
        scrub: true,    
        snap: {
            innerText:1
        } 
    }
  });

  gsap.to("#numberCount2", { innerText: 11, duration: 3, 
    scrollTrigger: {
        trigger: "#numberCount2",
        start: "top center",
        end: "bottom center",
        scrub: true,    
        snap: {
            innerText:1
        } 
    }
  });

  gsap.to("#numberCount3", { innerText: 200, duration: 3,
    scrollTrigger: {
        trigger: "#numberCount3",
        start: "top center",
        end: "bottom center",
        scrub: true,    
        snap: {
            innerText:5
        } 
    } 
  });