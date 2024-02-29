const buttonArticle = document.querySelectorAll(".button-article");
const headingText = document.querySelector('.heading-text');
const subHeading = document.querySelector(".subHeading");
const contentArticle = document.querySelector(".content-article");
const date = document.querySelector(".date");
const image_article = document.querySelector(".image-lightbox");
const closeContent = document.querySelector(".closeContent");
const lightBox = document.querySelector(".lightbox");

const articles = [{
    title: "stigma1",
    picture: "images/news-2.jpg",
    heading: "You are not Alone",
    subHeading: "Support and Understanding for Mental Health",
    contentArticle: "Education is key to combatting mental health stigma.",
}, {
    title: "stigma2",
    picture: "images/article-1.jpg",
    heading: "Young Adults and Psychosis",
    subHeading: "Impact",
    contentArticle: "Mental health stigma is a problem that exists in our society due to a lack of understanding.",
    date: "21st May, 2024",
},{
    title: "stigma3",
    picture: "images/article-2.jpg",
    heading: "Health Crisis is Real",
    subHeading: "Mental Health",
    contentArticle: "Mental health stigma is a problem that exists in our society due to a lack of understanding...",
    date: "21st May, 2024",
},{
    title: "stigma4",
    picture: "images/new.jpg",
    heading: "Healthcare For Young People",
    subHeading: "Dispelling Stereotypes",
    contentArticle: "The ages 16-25 is a problem that exists in our society due to a lack of understanding.....",
},{
    title: "stigma5",
    picture: "images/new-1.jpg",
    heading: "Health Awareness",
    subHeading: "Breaking Stigma",
    contentArticle: "The media often portrays people with various types psychosis as dangerous,unstable.... ",
},
,{
    title: "stigma6",
    picture: "images/new.jpg",
    heading: "Mental Health Stigma",
    subHeading: "Challenging Misconceptions",
    contentArticle: "Mental health stigma is a problem that exists.....",
}
];

function loadText(event) {
    const button = event.currentTarget;
    const articleBox = button.closest('.article-box');
    const id = articleBox.getAttribute('id');

    articles.forEach(article => {
        if (article.title === id) {
            lightBox.classList.remove('hidden');
            headingText.textContent = article.heading;
            subHeading.textContent = article.subHeading;
            contentArticle.textContent = article.contentArticle;
            date.textContent = article.date;
            image_article.src = article.picture;
        }
    });
}

function hideModel(event) {
  event.preventDefault();
  lightBox.classList.add('hidden');
}

// event listeners
buttonArticle.forEach(button => {
    button.addEventListener("click", loadText);
});

closeContent.addEventListener("click", hideModel);




