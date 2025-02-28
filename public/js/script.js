import NavFunc from "./utils/NavFunc.js";
import RealTimeDate from "./utils/RealTimeDate.js";
import AccountValidation from "./validation/AccountValidation.js";

document.addEventListener("DOMContentLoaded", () => {
  const root = document.getElementById("root");
  NavFunc();
  RealTimeDate();
  AccountValidation();
});
