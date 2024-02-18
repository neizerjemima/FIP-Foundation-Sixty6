(() => {
    
    const logo_section = document.querySelector('#logo-section');
    const user_menu = document.querySelector('.user_menu');
    const burger_menu = document.querySelector('.burger_menu');
    const burger_image = document.querySelector("#hamburger-image");
    const btn_burger = document.querySelector('.hamburger');

    
    
    function openBurgerMenu() {
      btn_burger.classList.toggle('is-active');
      burger_menu.classList.toggle('is-active');
      if (btn_burger.classList.contains("is-active")){
        burger_image.src = "../images/close_user.png";
        logo_section.style.display = 'none';
      } else{
        burger_image.src = "../images/white-burger.png";
        logo_section.style.display = 'block';
      }
    };
    
    
    function closeBurgerMenu() {
      btn_burger.classList.toggle('is-active');
      burger_menu.classList.toggle('is-active');
      if (btn_burger.classList.contains("is-active")){
        burger_image.src = "../images/close_user.png";
      } else{
        burger_image.src = "../images/white-burger.png";
      }
    };

    function openUserMenu() {
      logo_section.classList.toggle('is-active');
      user_menu.classList.toggle('is-active');
      if (logo_section.classList.contains("is-active")){
        btn_burger.style.display = 'none';
      } else{
        btn_burger.style.display = 'block';
      }

    };
    
    
    function closeUserMenu() {
      logo_section.classList.toggle('is-active');
      user_menu.classList.toggle('is-active');

    };

    burger_menu.addEventListener("click", closeBurgerMenu);
    btn_burger.addEventListener("click", openBurgerMenu);

    user_menu.addEventListener("click", closeUserMenu);
    logo_section.addEventListener("click", openUserMenu);

    
    
    })();