const active = ["text-blue-600", "bg-gray-300"];
const display = ["hidden"];

function routing() {
  const menuTabs = document.querySelectorAll(".menu-tabs");
  const tabs = document.querySelectorAll("#tabs a");

  function updateTabs() {
    let path = window.location.hash.replace("#", "") || "/";
    menuTabs.forEach((node) => {
      path = path === "/" ? "profile" : path;
      if (node.id !== path) {
        display.map((item) => node.classList.add(item));
        return;
      }
      display.map((item) => node.classList.remove(item));
    });

    tabs.forEach((node) => {
      path = path === "/" ? "profile" : path;
      if (node.id !== path) {
        active.map((item) => node.classList.remove(item));
        return;
      }
      active.map((item) => node.classList.add(item));
    });
  }

  updateTabs();
  window.addEventListener("hashchange", updateTabs);
}

export default routing;
