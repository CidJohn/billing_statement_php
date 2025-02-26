function NavFunc() {
  const linkItem = document.querySelectorAll("nav li a");
  setInterval(() => {
    const path = window.location.pathname;
    linkItem.forEach((item) => {
      if (item.getAttribute("href") === path) {
        ["text-blue-700"].forEach((classlist) => {
          item.classList.add(classlist);
        });
      } else {
        ["text-blue-700"].forEach((classlist) => {
          item.classList.remove(classlist);
        });
      }
    });
  }, 100);
}

export default NavFunc;
