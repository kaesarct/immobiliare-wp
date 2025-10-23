document.addEventListener("DOMContentLoaded", function () {
  var btn = document.querySelector(".menu-toggle");
  var nav = document.querySelector(".primary-navigation");
  if (btn && nav) {
    btn.addEventListener("click", function () {
      var expanded = btn.getAttribute("aria-expanded") === "true";
      btn.setAttribute("aria-expanded", String(!expanded));
      nav.classList.toggle("open");
    });
  }
});
