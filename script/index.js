let loginEl = document.querySelector(".login-el");
let blurEl = document.querySelector(".blur-el");
let createAccountEl = document.querySelector(".createAccount-el");
let backgroundEl = document.querySelector(".background");


function login() {
  blurEl.style.filter = "blur(5px)";
  loginEl.style.display = "block";
  createAccountEl.style.display = "none";
}

function fermer() {
  blurEl.style.filter = "blur(0)";
  loginEl.style.display = "none";
  createAccountEl.style.display = "none";
}

function createAccount(){
    loginEl.style.display = "none";
    createAccountEl.style.display = "grid";
}