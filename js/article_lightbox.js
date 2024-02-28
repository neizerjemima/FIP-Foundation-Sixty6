// (() => {
    const articleNews = document.querySelectorAll (".content a");
    const lightBox = document.querySelector("#newsReveal");

    const headingText = document.querySelector('.heading')

    function loadText(){
        articles.forEach((article, index) => {

            let selected = document.querySelector(`.contentPic1${index+1}`);
          function hoverPhotoAboutme() {
  
              headingText.textContent = article.description;
      
              selected.appendChild(headingText);
      
              paboutme.classList.add("aboutme-p");
              paboutme.classList.remove("aboutme-p-inactive");
          };
  
          function onlyPhotoAboutme() {
              paboutme.classList.remove("aboutme-p");
              paboutme.classList.add("aboutme-p-inactive");
            };
  
  
          selected.addEventListener("mouseleave", onlyPhotoAboutme);
          selected.addEventListener("mouseenter", hoverPhotoAboutme);
    
        })
    
      }
    
    loadAboutMe()
  
  

    // function newsContent() {
    //     lightBox.querySelector(".contentPic").src =
    //     article[this.dataset.img].picture;

    //      heading = document.querySelector(".heading");
    //     heading.textContent = article.heading

    //     lightBox.querySelector(".subHeading").textContent=
    //     article[this.dataset.img].subHeading;

    //     lightBox.querySelector(".content").textContent=
    //     article[this.dataset.img].content;
        
    //     lightBox.querySelector(".date").textContent=
    //     article[this.dataset.img].date;
        
    // }

    const articles = {
        picture: "images/img1.jpg",
        heading: "The Impact of Mental Health Stigma",
        subHeading: "Impact",
        content:
            "Stigma exists for mental health issues due to a lack of understanding. The media often portrays people with mental disorders as dangerous, violent or unstable.This can lead to people feeling afraid of those with mental disorders and can fuel discrimination. Some of the most common reasons this exists are: The belief that mental disorders are not real medical conditions. This can lead to people thinking that those who have mental disorders are simply weak or crazy.The belief that mental disorders are caused by personal failings. This can lead to people thinking that those with mental disorders are lazy, weird or attention-seeking.                The belief that mental disorders are untreatable. This can lead to people thinking that there is no point in seeking help for mental disorders. Fear of violence. People with mental disorders are often stereotyped as being dangerous, unpredictable and violent. This can make people very wary of interacting with them. The belief that mental disorders are contagious. This can lead to people avoiding those with mental disorders, as they believe they may catch the disorder themselves. Fundamentally, mental health stigma eventuates from a lack of understanding mental health issues and faulty beliefs that mental health is a personal issue rather than a genuine medical condition. ",
        Date: "21st May, 2024",
        };


    //     articleNews.forEach(function(info) {
    //     info.addEventListener("click", newsContent)
    // });


// })();