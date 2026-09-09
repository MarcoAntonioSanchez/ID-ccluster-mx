import {
  createIcons,
  Check,
  Menu,
  X,
  Phone,
  Mail,
  MapPin,
  PhoneCall,
} from "lucide";
import facebookIcon from "bootstrap-icons/icons/facebook.svg?raw";
import instagramIcon from "bootstrap-icons/icons/instagram.svg?raw";
import linkedinIcon from "bootstrap-icons/icons/linkedin.svg?raw";
import xIcon from "bootstrap-icons/icons/twitter-x.svg?raw";
import youtubeIcon from "bootstrap-icons/icons/youtube.svg?raw";

document.addEventListener("DOMContentLoaded", () => {
  createIcons({
    icons: {
      Check,
      Menu,
      X,
      Phone,
      Mail,
      MapPin,
      PhoneCall,
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
