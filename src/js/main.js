import { createIcons, Check, Menu, X, Phone, Mail, MapPin } from "lucide";
import { siFacebook, siInstagram, siYoutube } from "simple-icons";
import linkedinIcon from "../icons/brands/linkedin.svg";

document.addEventListener("DOMContentLoaded", () => {
  const socialIcons = {
    facebook: siFacebook,
    instagram: siInstagram,
    youtube: siYoutube,
    linkedin: linkedinIcon,
  };

  document.querySelectorAll("[data-social]").forEach((element) => {
    const iconName = element.dataset.social;
    const icon = socialIcons[iconName];

    if (!icon) {
      return;
    }

    if (iconName === "linkedin") {
      element.innerHTML = `
            <img
                src="${icon}"
                alt=""
                class="ccluster-topbar__social-icon"
            >
        `;

      return;
    }

    element.innerHTML = icon.svg;
  });

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
});
