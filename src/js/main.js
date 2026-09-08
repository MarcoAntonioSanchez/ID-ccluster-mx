import { createIcons, Check, Menu, X, Phone, Mail, MapPin } from "lucide";
import { siFacebook, siInstagram, siYoutube } from "simple-icons";

document.addEventListener("DOMContentLoaded", () => {
  const facebookIcon = siFacebook.svg;
  const facebookElement = document.querySelector('[data-social="facebook"]');
  const instagramIcon = siInstagram.svg;
  const instagramElement = document.querySelector('[data-social="instagram"]');
  const youtubeIcon = siYoutube.svg;
  const youtubeElement = document.querySelector('[data-social="youtube"]');

  if (facebookElement) {
    facebookElement.innerHTML = facebookIcon;
  }
  if (instagramElement) {
    instagramElement.innerHTML = instagramIcon;
  }
  if (youtubeElement) {
    youtubeElement.innerHTML = youtubeIcon;
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
