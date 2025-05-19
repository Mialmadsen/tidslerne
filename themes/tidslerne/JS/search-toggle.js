document.addEventListener("DOMContentLoaded", function () {
  const searchContainer = document.querySelector(".search-container");
  const searchIcon = document.querySelector(".search-icon");
  const searchInput = document.querySelector(".search-input");

  searchIcon.addEventListener("click", function (e) {
    e.stopPropagation();
    searchContainer.classList.toggle("active");
    if (searchContainer.classList.contains("active")) {
      searchInput.focus();
    }
  });

  document.addEventListener("click", function (e) {
    if (!searchContainer.contains(e.target)) {
      searchContainer.classList.remove("active");
    }
  });
});