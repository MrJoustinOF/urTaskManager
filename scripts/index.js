addEventListener("DOMContentLoaded", () => {
  const btnMenu = document.querySelector(".btn_menu");
  if (btnMenu) {
    btnMenu.addEventListener("click", () => {
      const menu_items = document.querySelector(".itemsMenu");
      menu_items.classList.toggle("show");
    });
  }
});
