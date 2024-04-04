export function backend_article(){  
    const article = Vue.createApp({
        created() {
            console.log("created lifecycle hook called");
            fetch("http://localhost/backend_fip/public/articlesandauthors")
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    this.articlesData = data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
   
        
        data() {
            return {
                articlesData: [],
                error: ""
            };
        },
    
        methods: {
            handleButtonClick(event) {
                const buttonId = event.currentTarget.id;
                const articleId = buttonId.split('-')[1];
                const articleData = this.articlesData.find(article => article.id === parseInt(articleId));
    
                if (articleData) {
                    const lightboxContent = document.querySelector(".content-lightbox");
                    if (lightboxContent) {
                        lightboxContent.innerHTML = `
                            <div>
                                <img src="images/${articleData.image}" alt="${articleData.title}" class="image-lightbox">
                            </div>
                            <div class="text-lightbox">
                            <p><span class="heading-text">${articleData.title}</span></p>
                            <p><span class="content-article">${articleData.text}</span></p>
                            <p><span class="author">${articleData.first_name} ${articleData.last_name}</span></p>
                            <p><span class="about">${articleData.about}</span></p>
                            </div>
                        `;
                        const lightbox = document.querySelector("#newsReveal");
                        lightbox.classList.remove("hidden");

                        const closeContent = document.querySelector(".closeContent");

                        function hideModel(event) {
                            event.preventDefault();
                            lightbox.classList.add("hidden");
                          }

                        closeContent.addEventListener("click", hideModel);

                    } else {
                        console.error("Lightbox content not found");
                    }
                } else {
                    console.error("Article not found");
                }
            },
        }
    });
    
    article.mount(".app");
}

