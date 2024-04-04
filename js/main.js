import { burger_menu } from "./modules/burger_menu.js";
import { countdown } from "./modules/countdown.js";
import { volunteer_button } from "./modules/volunteer_button.js";
import { donation_button } from "./modules/donation_buttton.js";
import { gethelp_lightbox } from "./modules/gethelp_lightbox.js";
import { burger_user } from "./modules/burger_user.js";



import { backend_article } from "./modules/backend_article.js";
import { backend_event } from "./modules/backend_event.js";
import { backend_contact } from "./modules/backend_contact.js";
import { backend_gethelp } from "./modules/backend_gethelp.js";
import { backend_volunteer } from "./modules/backend_volunteer.js";
import { backend_donation } from "./modules/backend_donation.js";
import { backend_team } from "./modules/backend_team.js";
import { backend_collaborator } from "./modules/backend_collaborator.js";
import { backend_newsletter } from "./modules/backend_newsletter.js";




//Principal Website

if (document.body.dataset.page === "home"){
  backend_volunteer();
  backend_donation();
  burger_menu();
  countdown();
  backend_collaborator();
  volunteer_button();
  donation_button();
  backend_newsletter();
 } else if (document.body.dataset.page === "faq"){
    backend_volunteer();
    backend_donation();
    burger_menu();
    volunteer_button();
    donation_button();
    backend_newsletter();
 }  else if (document.body.dataset.page === "gethelp"){
  backend_volunteer();
  backend_donation();
    backend_gethelp();
      burger_menu();
      volunteer_button();
      donation_button();
      gethelp_lightbox();
        backend_newsletter();
 } else if (document.body.dataset.page === "about"){
  backend_volunteer();
  backend_donation();
  burger_menu();
  volunteer_button();
  donation_button();
  backend_team();
  backend_newsletter();
 }else if (document.body.dataset.page === "contact"){
  backend_volunteer();
  backend_donation();
   backend_contact();
   burger_menu();
   volunteer_button();
   donation_button();
  backend_newsletter();
 }else if (document.body.dataset.page === "articles"){
  backend_volunteer();
  backend_donation();
   backend_article();
   burger_menu();
   volunteer_button();
   donation_button();
   backend_newsletter();
}else if (document.body.dataset.page === "events"){
  backend_volunteer();
  backend_donation();
   backend_event();
   burger_menu();
   volunteer_button();
   donation_button();
   backend_newsletter();
  }else if (document.body.dataset.page === "media"){
    backend_volunteer();
    backend_donation();
    burger_menu();
    volunteer_button();
    donation_button();
    backend_newsletter();
 }

//User interface

else if (document.body.dataset.page === "cms"){
  burger_user();
 } 

