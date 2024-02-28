(() => {
    const articleNews = document.querySelectorAll (".content a");
    const lightBox = document.querySelector("#newsReveal");

    function newsContent() {
        
    }

articleNews.forEach(function(info) {
info.addEventListener("click", newsContent)
});
})();