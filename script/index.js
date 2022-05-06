let loginEl = document.querySelector(".login-el");
let blurEl = document.querySelector(".blur-el");
let createAccountEl = document.querySelector(".createAccount-el");
let passwordAccountEl = document.querySelector(".passwordAccount-el");
let backgroundEl = document.querySelector(".background");

//----------------------BACKGROUND PARALLAXE----------------------//
let image2El = document.querySelector(".image2");
let image3El = document.querySelector(".image3");
let image4El = document.querySelector(".image4");
let image5El = document.querySelector(".image5");

window.addEventListener("scroll", function () {
  let value = window.scrollY;

  image2El.style.bottom = value * 0.15 + -4 * 16 + "px";
  image3El.style.top = value * 0.5 + 3 * 16 + "px";
  image4El.style.bottom = value * 0.1 + -8 * 16 + "px";
  image5El.style.bottom = value * 0.28 + 5 * 16 + "px";
});
//---------------------------------------------------------------//
function login() {
  blurEl.style.filter = "blur(5px)";
  loginEl.style.display = "block";
  createAccountEl.style.display = "none";
  passwordAccountEl.style.display = "none";

  setTimeout(function () {
    grow(loginEl);
  }, 500);
}

function fermer() {
  blurEl.style.filter = "blur(0)";
  loginEl.style.display = "none";
  createAccountEl.style.display = "none";
  passwordAccountEl.style.display = "none";
}

function createAccount() {
  loginEl.style.display = "none";
  createAccountEl.style.display = "grid";
}

function passwordAccount() {
  loginEl.style.display = "none";
  passwordAccountEl.style.display = "grid";
}
