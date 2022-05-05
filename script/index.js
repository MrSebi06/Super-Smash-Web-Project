let loginEl = document.querySelector(".login-el");
let blurEl = document.querySelector(".blur-el");

function login() {
  loginEl.style.display = "block";
  blurEl.style.filter = "blur(5px)";
}

function fermer() {
  loginEl.style.display = "none";
  blurEl.style.filter = "blur(0)";
}
