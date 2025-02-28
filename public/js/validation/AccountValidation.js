import { clearError, showError } from "../utils/SpanError.js";

let field = [];
const symbolRegex = /[!@#$%^&*(),.?":{}|<>]/g;
const passwordSymbolRegex = /[!@#$%^&*]/;

function AccountValidation() {
  const form = document.querySelector("#frmCreateAccount");
  const inputs = document.querySelectorAll("#frmCreateAccount input");
  const reqInputs = document.querySelectorAll("#frmCreateAccount input[title]");
  inputs.forEach((item) => {
    field[item.id] = item;
  });

  if (form) {
    form.addEventListener("submit", (e) => {
      let isValid = true;

      inputs.forEach((item) => {
        const value = item.value.trim();
        if (item.id !== "email" && symbolRegex.test(value)) {
          showError(item, `${item.title} cannot contain special characters`);
          isValid = false;
          e.preventDefault();
        } else {
          clearError(item);
        }
      });

      reqInputs.forEach((input) => {
        const value = input.value.trim();
        if (!value) {
          showError(input, `${input.title || "This field"} is required`);
          isValid = false;
          e.preventDefault();
        }
      });

      if (field["cpass"].value !== field["password"].value) {
        showError(field["cpass"], "Passwords do not match!");
        isValid = false;
      }

      if (!isValid) {
        e.preventDefault();
      } else {
        console.log("test");
        form.method = "POST";
        form.action = "/create-account";
      }
    });
  }
}

export default AccountValidation;
