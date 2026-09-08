import { createIcons, Check, Menu, X, Phone, Mail, MapPin } from "lucide";
import facebookIcon from "bootstrap-icons/icons/facebook.svg";
import instagramIcon from "bootstrap-icons/icons/instagram.svg";
import linkedinIcon from "bootstrap-icons/icons/linkedin.svg";
import xIcon from "bootstrap-icons/icons/twitter-x.svg";
import youtubeIcon from "bootstrap-icons/icons/youtube.svg";

document.addEventListener("DOMContentLoaded", () => {
  createIcons({
    icons: {
      Check,
      Menu,
      X,
      Phone,
      Mail,
      MapPin,
    },
  });

  const menuButton = document.querySelector("[data-menu-toggle]");
  const mobileMenu = document.querySelector("[data-mobile-menu]");

  if (!menuButton || !mobileMenu) {
    return;
  }

  menuButton.addEventListener("click", () => {
    const isOpen = menuButton.getAttribute("aria-expanded") === "true";

    menuButton.setAttribute("aria-expanded", String(!isOpen));

    mobileMenu.hidden = isOpen;
  });

  const socialIcons = {
    facebook: facebookIcon,
    instagram: instagramIcon,
    linkedin: linkedinIcon,
    x: xIcon,
    youtube: youtubeIcon,
  };
  document.querySelectorAll("[data-social]").forEach((element) => {
    const iconName = element.dataset.social;
    const icon = socialIcons[iconName];

    if (!icon) {
      return;
    }

    element.innerHTML = icon;
  });
});
