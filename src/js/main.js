import { createIcons, Check, Menu, X, Phone, Mail, MapPin } from "lucide";
import { siFacebook } from "simple-icons";

document.addEventListener("DOMContentLoaded", () => {
  const facebookIcon = siFacebook.svg;
  const facebookElement = document.querySelector('[data-social="facebook"]');

  if (facebookElement) {
    facebookElement.innerHTML = facebookIcon;
  }

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
