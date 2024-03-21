import { burger_menu } from "./modules/burger_menu.js";
import { countdown } from "./modules/countdown.js";
import { volunteer_button } from "./modules/volunteer_button.js";
import { donation_button } from "./modules/donation_buttton.js";
import { gethelp_lightbox } from "./modules/gethelp_lightbox.js";
import { article_lightbox } from "./modules/article_lightbox.js";
import { burger_user } from "./modules/burger_user.js";
import { menutable_user } from "./modules/menutable_user.js";


//Principal Website

if (document.body.dataset.page === "home"){
  burger_menu();
  countdown();
  volunteer_button();
  donation_button();
 } else if (document.body.dataset.page === "faq"){
    burger_menu();
    volunteer_button();
    donation_button();
 } else if (document.body.dataset.page === "gethelp"){
    burger_menu();
    volunteer_button();
    donation_button();
    gethelp_lightbox();
 } else if (document.body.dataset.page === "about"){
  burger_menu();
  volunteer_button();
  donation_button();
 }else if (document.body.dataset.page === "contact"){
  burger_menu();
  volunteer_button();
  donation_button();
 }else if (document.body.dataset.page === "articles"){
  burger_menu();
  volunteer_button();
  donation_button();
  article_lightbox();
 }else if (document.body.dataset.page === "media"){
  burger_menu();
  volunteer_button();
  donation_button();
 }

//User interface

else if (document.body.dataset.page === "home-cms"){
  burger_user();
 } else if (document.body.dataset.page === "login-cms"){
  burger_user();
 }else if (document.body.dataset.page === "volunteer-add-cms"){
  burger_user();
 }else if (document.body.dataset.page === "volunteer-edit-cms"){
  burger_user();
 }else if (document.body.dataset.page === "volunteer-more-cms"){
  burger_user();
 }else if (document.body.dataset.page === "volunteer-principal-cms"){
  burger_user();
  menutable_user();
 }

