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

  const particles = [];
  const particleCount = 22;
  const particleRadius = 100;
  const connectionDistance = 110;

  function createParticles() {
    particles.length = 0;

    for (let i = 0; i < particleCount; i++) {
      const angle = Math.random() * Math.PI * 2;
      const distance = Math.random() * particleRadius;

      particles.push({
        x: pointer.x + Math.cos(angle) * distance,
        y: pointer.y + Math.sin(angle) * distance,
        vx: (Math.random() - 0.5) * 0.25,
        vy: (Math.random() - 0.5) * 0.25,
        radius: Math.random() * 2.5 + 1,
        opacity: Math.random() * 0.7 + 0.25,
      });
    }
  }

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

  createParticles();

  window.addEventListener("resize", resizeCanvas);

  hero.addEventListener("pointermove", handlePointerMove);

  hero.addEventListener("pointerleave", handlePointerLeave);

  function render() {
    context.clearRect(0, 0, width, height);

    if (pointer.active) {
      particles.forEach((particle) => {
        particle.x += particle.vx;
        particle.y += particle.vy;

        const dx = particle.x - pointer.x;
        const dy = particle.y - pointer.y;

        const distance = Math.sqrt(dx * dx + dy * dy);

        if (distance > particleRadius) {
          const angle = Math.random() * Math.PI * 2;

          particle.x = pointer.x + Math.cos(angle) * particleRadius;

          particle.y = pointer.y + Math.sin(angle) * particleRadius;
        }

        context.beginPath();

        context.arc(particle.x, particle.y, particle.radius, 0, Math.PI * 2);

        context.fillStyle = `rgba(
        255,
        255,
        255,
        ${particle.opacity}
      )`;

        context.fill();
      });
    }

    particles.forEach((particle, index) => {
      for (let i = index + 1; i < particles.length; i++) {
        const otherParticle = particles[i];

        const dx = particle.x - otherParticle.x;
        const dy = particle.y - otherParticle.y;

        const distance = Math.sqrt(dx * dx + dy * dy);

        if (distance > connectionDistance) {
          continue;
        }

        const opacity = (1 - distance / connectionDistance) * 0.25;

        context.beginPath();

        context.moveTo(particle.x, particle.y);

        context.lineTo(otherParticle.x, otherParticle.y);

        context.strokeStyle = `rgba(
      255,
      255,
      255,
      ${opacity}
    )`;

        context.lineWidth = 0.9;

        context.stroke();
      }
    });

    requestAnimationFrame(render);
  }

  render();
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
