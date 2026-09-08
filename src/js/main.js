import { createIcons, Check, Menu, X, Phone, Mail } from "lucide";
import { siFacebook } from "simple-icons";

console.log(siFacebook);

document.addEventListener("DOMContentLoaded", () => {
  createIcons({
    icons: {
      Check,
      Menu,
      X,
      Phone,
      Mail,
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
