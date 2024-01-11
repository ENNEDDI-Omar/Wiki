let email = document.getElementById("email");
let password = document.getElementById("password");
let nom = document.getElementById("nom");
let prenom = document.getElementById("prenom");
let emailRegex =/^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$/;
console.log(email);
nom.addEventListener("keyup", function () {

    if (nom.value === "") {
      nom.nextElementSibling.style.display = "block";
    } else {
      nom.nextElementSibling.style.display = "none";
    }

  });
  prenom.addEventListener("keyup", function () {

    if (prenom.value === "") {
      prenom.nextElementSibling.style.display = "block";
    } else {
      prenom.nextElementSibling.style.display = "none";
    }

  });
  email.addEventListener("keyup", function () {

    if (email.value === ""  !email.value.match(emailRegex)) {
      email.nextElementSibling.style.display = "block";
    } else {
      email.nextElementSibling.style.display = "none";
    }
  });
  password.addEventListener("keyup", function () {

    if (password.value === ""  password.value.length <= 8 ) {
     password.nextElementSibling.style.display = "block";
    } else {
      password.nextElementSibling.style.display = "none";
    }
  });