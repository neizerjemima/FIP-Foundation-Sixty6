export function burger_user(){  

  const logo_section = document.querySelector('#user-section');
  const user_menu = document.querySelector('.user_menu');
  const burger_menu = document.querySelector('.burger_menu');
  const burger_image = document.querySelector("#hamburger-image");
  const btn_burger = document.querySelector('.hamburger');
  const dropdown_menu = document.querySelector('.dropdown-menu');

  function openBurgerMenu() {
      btn_burger.classList.add('is-active');
      burger_menu.classList.add('is-active');
      burger_image.src = "../images/close_user.png";
  }

  function closeBurgerMenu() {
      btn_burger.classList.remove('is-active');
      burger_menu.classList.remove('is-active');
      burger_image.src = "../images/white-burger.png";
  }

  burger_menu.addEventListener("click", closeBurgerMenu);
  btn_burger.addEventListener("click", () => {
      if (btn_burger.classList.contains('is-active')) {
          closeBurgerMenu();
      } else {
          openBurgerMenu();
      }
  });
}
