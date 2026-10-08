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

function initAlternativeParticles() {
  console.log("initAlternativeParticles LOADED");
  const hero = document.querySelector("#alternative-hero");
  const canvas = document.querySelector(".ccluster-hero-alt__particles");

  if (!hero || !canvas) {
    return;
  }

  const context = canvas.getContext("2d");

  if (!context) {
    return;
  }

  let width = 0;
  let height = 0;

  const pointer = {
    x: 0,
    y: 0,
    active: false,
  };

  function resizeCanvas() {
    const rect = hero.getBoundingClientRect();
    const pixelRatio = window.devicePixelRatio || 1;

    width = rect.width;
    height = rect.height;

    canvas.width = width * pixelRatio;
    canvas.height = height * pixelRatio;

    canvas.style.width = `${width}px`;
    canvas.style.height = `${height}px`;

    context.setTransform(pixelRatio, 0, 0, pixelRatio, 0, 0);
  }

  function handlePointerMove(event) {
    const rect = hero.getBoundingClientRect();

    pointer.x = event.clientX - rect.left;
    pointer.y = event.clientY - rect.top;
    pointer.active = true;
  }

  function handlePointerLeave() {
    pointer.active = false;
  }

  resizeCanvas();

  window.addEventListener("resize", resizeCanvas);

  hero.addEventListener("pointermove", handlePointerMove);

  hero.addEventListener("pointerleave", handlePointerLeave);
}

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

  // PARTICLES - ALT HERO
  initAlternativeParticles();
});
