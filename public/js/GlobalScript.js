import changeFavicon from "./utils/changeFavicon.js";
import loadingEffect from "./utils/loadingEffect.js";
import NavFunc from "./utils/NavFunc.js";
import RealTimeDate from "./utils/RealTimeDate.js";
import AccountValidation from "./validation/AccountValidation.js";

document.addEventListener("DOMContentLoaded", () => {
  const root = document.getElementById("root");
  changeFavicon("/public/assets/img/bg-2-billing-statement.png");
  loadingEffect();
  NavFunc();
  RealTimeDate();
  AccountValidation();
});
