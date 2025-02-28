export function showError(input, message) {
  let errorSpan = input.nextElementSibling;
  ["border", "border-red-600"].forEach((item) => {
    input.classList.add(item);
  });
  if (!errorSpan || errorSpan.tagName !== "SPAN") {
    errorSpan = document.createElement("span");
    errorSpan.style.color = "red";
    ["text-[12px]", "italic"].forEach((items) =>
      errorSpan.classList.add(items)
    );
    input.parentNode.appendChild(errorSpan);
  }

  errorSpan.textContent = message;
}

export function clearError(input) {
  let errorSpan = input.nextElementSibling;
  ["border", "border-red-600"].forEach((item) => {
    input.classList.remove(item);
  });
  ["border", "border-gray-300"].forEach((item) => {
    input.classList.add(item);
  });
  if (errorSpan && errorSpan.tagName === "SPAN") {
    errorSpan.textContent = "";
  }
}
