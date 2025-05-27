document.addEventListener("DOMContentLoaded", () => {
  const menu = document.querySelector(".hidden_menu_container");
  const openBtn = document.querySelector(".open-sidebar-button");
  const closeBtn = document.querySelector(".close-sidebar-button");

  if (menu && openBtn && closeBtn) {
    openBtn.addEventListener("click", () => {
      menu.classList.add("active");
      openBtn.classList.add("hide");
      document.body.classList.add("menu-open");
    });

    closeBtn.addEventListener("click", () => {
      menu.classList.remove("active");
      openBtn.classList.remove("hide");
      document.body.classList.remove("menu-open");
    });
  } else {
    console.warn("One or more menu elements not found", { menu, openBtn, closeBtn });
  }
});