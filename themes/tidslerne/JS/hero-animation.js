document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector(".hero-buttons-box")) {
    gsap.from(".hero-buttons-box", {
      x: 100,
      opacity: 0,
      duration: 1,
      ease: "power3.out",
    });

    gsap.from(".hero-button", {
      opacity: 0,
      y: 20,
      duration: 0.5,
      stagger: 0.2,
      delay: 0.5,
    });
  }
});