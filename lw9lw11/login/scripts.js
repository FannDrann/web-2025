document.addEventListener("DOMContentLoaded", function () {
  const emailInput = document.querySelector('input[name="email"]');
  const passwordInput = document.querySelector('input[name="Password"]');
  const submitButton = document.querySelector(".wrapper__form-submit");

  const correctEmail = "aboba@mail.ru";
  const correctPassword = "aboba";

  submitButton.addEventListener("click", function () {
    const enteredEmail = emailInput.value.trim();
    const enteredPassword = passwordInput.value;

    let hasError = false;


    if (enteredEmail !== correctEmail) {
      hasError = true;
    }

    if (enteredPassword !== correctPassword) {
      hasError = true;
    }

    if (!hasError) {
      console.log("Успешный вход!");
    }
    else{
      console.log("Не тот пароль или логин")
    }
  });
});
