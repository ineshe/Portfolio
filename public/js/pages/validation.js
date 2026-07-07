document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector(".contact-form");
  if (!form) return;

  const fields = form.querySelectorAll("#fname, #email, #message");

  fields.forEach((field) => {
    field.addEventListener("blur", () => validateField(field));
    field.addEventListener("input", () => {
      if (field.dataset.touched === "true") validateField(field);
    });
  });

  form.addEventListener("submit", (evt) => {
    let formIsValid = true;
    fields.forEach((field) => {
      if (!validateField(field)) formIsValid = false;
    });

    if (!formIsValid) {
      evt.preventDefault();
      form.querySelector(":invalid")?.focus();
    }
  });
});

function validateField(field) {
  field.dataset.touched = "true";
  const errorNode = document.getElementById(`${field.id}-error`);
  if (!errorNode) return field.validity.valid;

  if (field.validity.valid) {
    errorNode.textContent = "";
    errorNode.classList.remove("active");
    field.setAttribute("aria-invalid", "false");
    return true;
  }

  errorNode.textContent = getErrorMessage(field);
  errorNode.classList.add("active");
  field.setAttribute("aria-invalid", "true");
  return false;
}

function getErrorMessage(field) {
  const { validity } = field;

  if (field.id === "fname") {
    if (validity.valueMissing) return "Bitte gib deinen Namen ein.";
    if (validity.patternMismatch) return "Zahlen und Sonderzeichen sind im Namen nicht erlaubt.";
    if (validity.tooShort) return "Der Name muss mindestens 2 Zeichen lang sein.";
  } else if (field.id === "email") {
    if (validity.valueMissing) return "Bitte gib deine E-Mail-Adresse ein.";
    if (validity.typeMismatch) return "Bitte gib eine gültige E-Mail-Adresse ein.";
  } else if (field.id === "message") {
    if (validity.valueMissing) return "Bitte gib eine Nachricht ein.";
    if (validity.tooShort) return "Die Nachricht muss mindestens 10 Zeichen lang sein.";
  }

  return "Bitte überprüfe dieses Feld.";
}
