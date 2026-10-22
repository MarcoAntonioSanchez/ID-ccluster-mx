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
  const hero = document.querySelector("#home-hero");
  const canvas = hero?.querySelector(".ccluster-hero__particles");

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

  let particlesOpacity = 0;
  let targetParticlesOpacity = 0;

  const particles = [];
  const particleCount = 25;
  const particleRadius = 150;
  const connectionDistance = 125;

  function createParticles() {
    particles.length = 0;

    for (let i = 0; i < particleCount; i++) {
      const angle = Math.random() * Math.PI * 2;
      const distance = Math.random() * particleRadius;

      particles.push({
        x: pointer.x + Math.cos(angle) * distance,
        y: pointer.y + Math.sin(angle) * distance,
        vx: (Math.random() - 0.5) * 0.7,
        vy: (Math.random() - 0.5) * 0.7,
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

    targetParticlesOpacity = 1;
  }

  function handlePointerLeave() {
    pointer.active = false;
    targetParticlesOpacity = 0;
  }

  resizeCanvas();

  createParticles();

  window.addEventListener("resize", resizeCanvas);

  hero.addEventListener("pointermove", handlePointerMove);

  hero.addEventListener("pointerleave", handlePointerLeave);

  function render() {
    context.clearRect(0, 0, width, height);

    particlesOpacity += (targetParticlesOpacity - particlesOpacity) * 0.06;

    if (particlesOpacity > 0.01) {
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

        context.fillStyle = `rgba(7,19,49, ${particle.opacity * particlesOpacity})`;

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

        const opacity =
          (1 - distance / connectionDistance) * 0.4 * particlesOpacity;

        context.beginPath();

        context.moveTo(particle.x, particle.y);

        context.lineTo(otherParticle.x, otherParticle.y);

        context.strokeStyle = `rgba(7, 19, 49, ${opacity})`;

        context.lineWidth = 1.5;

        context.stroke();
      }
    });

    requestAnimationFrame(render);
  }

  render();
}

/**
 * HERO MAIN - SEQUENTIAL CONTENT ANIMATION
 *
 * Coordina la entrada y salida del logo, H1, descripción y CTA.
 * Utiliza las clases CSS existentes para animar opacidad y posición.
 */
function initHeroContentSequence() {
  const hero = document.querySelector("#home-hero");

  // Si el Hero Main no existe en esta página, no hacemos nada.
  if (!hero) return;

  // Localizamos los elementos por sus atributos de secuencia.
  const logo = hero.querySelector('[data-hero-sequence="logo"]');
  const heading = hero.querySelector('[data-hero-sequence="heading"]');
  const description = hero.querySelector('[data-hero-sequence="description"]');
  const cta = hero.querySelector('[data-hero-sequence="cta"]');

  // Espera una cantidad de milisegundos antes de continuar.
  const wait = (duration) =>
    new Promise((resolve) => setTimeout(resolve, duration));

  // Activa la transición de entrada.
  const show = (element) => {
    if (!element) return;

    element.classList.remove("is-exiting");
    element.classList.add("is-visible");
  };

  // Activa la transición de salida.
  const hide = (element) => {
    if (!element) return;

    element.classList.remove("is-visible");
    element.classList.add("is-exiting");
  };

  // Oculta todos los elementos al inicializar la secuencia.
  [logo, heading, description, cta].forEach((element) => {
    if (!element) return;

    element.classList.remove("is-visible", "is-exiting");
  });

  // Ejecuta el ciclo completo continuamente.
  async function runSequence() {
    while (true) {
      // 1. Logo: entra, permanece y sale.
      if (logo) {
        show(logo);
        await wait(1800);

        hide(logo);
        await wait(700);
      }

      // 2. H1: entra, permanece y sale.
      if (heading) {
        show(heading);
        await wait(2200);

        hide(heading);
        await wait(700);
      }

      // 3. Descripción: entra y permanece visible.
      if (description) {
        show(description);
        await wait(1200);
      }

      // 4. CTA: aparece sin ocultar la descripción.
      if (cta) {
        show(cta);
        await wait(2200);
      } else {
        await wait(1500);
      }

      // 5. Descripción y CTA salen juntos.
      hide(description);
      hide(cta);

      // Dejamos terminar la transición antes de reiniciar.
      await wait(700);
    }
  }

  runSequence();
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

  if (menuButton && mobileMenu) {
    menuButton.addEventListener("click", () => {
      const isOpen = menuButton.getAttribute("aria-expanded") === "true";

      menuButton.setAttribute("aria-expanded", String(!isOpen));

      mobileMenu.hidden = isOpen;
    });
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

  // COURSE ACCORDION TABS
  const courseAccordions = document.querySelectorAll(
    ".ccluster-proximo-curso__accordion",
  );

  courseAccordions.forEach((accordion) => {
    const tabs = accordion.querySelectorAll(
      ".ccluster-proximo-curso__accordion-tab",
    );

    const panels = accordion.querySelectorAll(
      ".ccluster-proximo-curso__accordion-panel",
    );

    tabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        const targetPanelId = tab.getAttribute("aria-controls");

        tabs.forEach((item) => {
          const isActive = item === tab;

          item.classList.toggle("is-active", isActive);
          item.setAttribute("aria-selected", String(isActive));
          item.tabIndex = isActive ? 0 : -1;
        });

        panels.forEach((panel) => {
          const isActive = panel.id === targetPanelId;

          panel.hidden = !isActive;
          panel.classList.toggle("is-active", isActive);
        });
      });
    });
  });

  // NUESTRA HISTORIA - STEPPED INFINITE TIMELINE + YEAR COUNTERS
  const historyTrack = document.querySelector(
    ".ccluster-nuestra-historia__track",
  );

  if (historyTrack) {
    const originalEvents = Array.from(historyTrack.children);

    const historyYearCounters = originalEvents.flatMap((event) =>
      Array.from(event.querySelectorAll("[data-counter]")),
    );

    // Duplicate the events; cloned counters show their final values.
    originalEvents.forEach((event) => {
      const clone = event.cloneNode(true);

      clone.setAttribute("aria-hidden", "true");

      clone.querySelectorAll("[data-counter]").forEach((counter) => {
        counter.textContent = counter.dataset.target || counter.textContent;
        counter.removeAttribute("data-counter");
      });

      historyTrack.appendChild(clone);
    });

    let completedCounters = 0;
    let timelineStarted = false;
    let timelineTimer = null;

    const prefersReducedMotion = window.matchMedia(
      "(prefers-reduced-motion: reduce)",
    ).matches;

    const startTimeline = () => {
      if (timelineStarted) return;
      timelineStarted = true;

      timelineTimer = window.setTimeout(() => {
        if (prefersReducedMotion) return;

        const getStepWidth = () => {
          const firstEvent = historyTrack.firstElementChild;
          if (!firstEvent) return 0;

          const trackStyle = window.getComputedStyle(historyTrack);
          const gap = parseFloat(trackStyle.columnGap) || 0;

          return firstEvent.getBoundingClientRect().width + gap;
        };

        const moveToNextEvent = () => {
          const stepWidth = getStepWidth();

          if (!stepWidth) {
            timelineTimer = window.setTimeout(moveToNextEvent, 2000);
            return;
          }

          historyTrack.style.transition =
            "transform 700ms cubic-bezier(0.22, 1, 0.36, 1)";

          historyTrack.style.transform = `translateX(-${stepWidth}px)`;

          const onTransitionEnd = (event) => {
            if (event.propertyName !== "transform") return;

            historyTrack.removeEventListener("transitionend", onTransitionEnd);

            // Move the first event to the end, then reset without animation.
            historyTrack.style.transition = "none";
            historyTrack.appendChild(historyTrack.firstElementChild);
            historyTrack.style.transform = "translateX(0)";

            // Force the browser to apply the reset before the next movement.
            void historyTrack.offsetWidth;

            timelineTimer = window.setTimeout(moveToNextEvent, 2000);
          };

          historyTrack.addEventListener("transitionend", onTransitionEnd);
        };

        moveToNextEvent();
      }, 1500);
    };

    if (historyYearCounters.length === 0) {
      startTimeline();
    } else {
      historyYearCounters.forEach((counter) => {
        counter.addEventListener(
          "ccluster:counter-complete",
          () => {
            completedCounters += 1;

            if (completedCounters === historyYearCounters.length) {
              startTimeline();
            }
          },
          { once: true },
        );
      });
    }
  }

  // REUSABLE COUNTERS
  const counters = document.querySelectorAll("[data-counter]");

  counters.forEach((counter) => {
    const target = Number(counter.dataset.target) || 20;
    const duration = Number(counter.dataset.duration) || 3500;

    const prefersReducedMotion = window.matchMedia(
      "(prefers-reduced-motion: reduce)",
    ).matches;

    let hasAnimated = false;

    const finishCounter = () => {
      counter.textContent = target;
      counter.dispatchEvent(new Event("ccluster:counter-complete"));
    };

    const animateCounter = () => {
      if (hasAnimated) return;
      hasAnimated = true;

      if (prefersReducedMotion) {
        finishCounter();
        return;
      }

      const startTime = performance.now();

      const updateCounter = (currentTime) => {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const easedProgress = 1 - Math.pow(1 - progress, 3);

        counter.textContent = Math.floor(easedProgress * target);

        if (progress < 1) {
          requestAnimationFrame(updateCounter);
        } else {
          finishCounter();
        }
      };

      requestAnimationFrame(updateCounter);
    };

    if ("IntersectionObserver" in window) {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              animateCounter();
              observer.disconnect();
            }
          });
        },
        { threshold: 0.5 },
      );

      observer.observe(counter);
    } else {
      animateCounter();
    }
  });

  /* ECOSISTEMA DE SOLUCIONES — CAROUSEL */
  const servicesCarousel = document.querySelector(
    ".ccluster-ecosistema-soluciones__carousel",
  );

  if (servicesCarousel) {
    const slides = Array.from(
      servicesCarousel.querySelectorAll("[data-service-slide]"),
    );

    const bullets = Array.from(
      servicesCarousel.querySelectorAll("[data-service-bullet]"),
    );

    if (slides.length > 0 && bullets.length === slides.length) {
      let activeIndex = Math.max(
        0,
        slides.findIndex((slide) => !slide.hidden),
      );

      const showSlide = (index) => {
        const nextIndex = (index + slides.length) % slides.length;

        if (nextIndex === activeIndex) return;

        const previousSlide = slides[activeIndex];
        const nextSlide = slides[nextIndex];

        previousSlide.hidden = true;
        previousSlide.classList.remove("is-entering");

        activeIndex = nextIndex;

        nextSlide.hidden = false;
        nextSlide.classList.add("is-entering");

        // Aplicar el estado inicial antes de iniciar la transición.
        void nextSlide.offsetWidth;

        nextSlide.classList.remove("is-entering");

        slides.forEach((slide, slideIndex) => {
          slide.setAttribute("aria-hidden", String(slideIndex !== activeIndex));
        });

        bullets.forEach((bullet, bulletIndex) => {
          const isActive = bulletIndex === activeIndex;

          bullet.classList.toggle("is-active", isActive);

          if (isActive) {
            bullet.setAttribute("aria-current", "true");
          } else {
            bullet.removeAttribute("aria-current");
          }
        });
      };

      // Navegación mediante las flechas.
      slides.forEach((slide, index) => {
        slide
          .querySelector("[data-service-prev]")
          ?.addEventListener("click", () => showSlide(index - 1));

        slide
          .querySelector("[data-service-next]")
          ?.addEventListener("click", () => showSlide(index + 1));
      });

      // Navegación mediante los bullets.
      bullets.forEach((bullet, index) => {
        bullet.addEventListener("click", () => showSlide(index));
      });

      // Sincronizar el estado inicial sin cambiar de diapositiva.
      slides.forEach((slide, index) => {
        slide.setAttribute("aria-hidden", String(index !== activeIndex));
      });

      bullets.forEach((bullet, index) => {
        const isActive = index === activeIndex;

        bullet.classList.toggle("is-active", isActive);

        if (isActive) {
          bullet.setAttribute("aria-current", "true");
        } else {
          bullet.removeAttribute("aria-current");
        }
      });
    }
  }

  // PARTICLES - MAIN HERO
  initAlternativeParticles();

  // MAIN HERO - CONTENT SEQUENCE
  initHeroContentSequence();
});
