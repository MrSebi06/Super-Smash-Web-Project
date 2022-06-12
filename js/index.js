//----------------------BACKGROUND PARALLAXE----------------------//

if ((document.querySelector("title").innerHTML = "Accueil")) {
  const image2El = document.querySelector(".image2");
  const image3El = document.querySelector(".image3");
  const image4El = document.querySelector(".image4");
  const image5El = document.querySelector(".image5");
  const image6El = document.querySelector(".image6");

  window.addEventListener("scroll", function () {
    let value = window.scrollY;

    image2El.style.bottom = value * 0.15 + -4 * 16 + "px";
    image3El.style.top = value * 0.5 + 3 * 16 + "px";
    image4El.style.bottom = value * 0.1 + -8 * 16 + "px";
    image5El.style.bottom = value * 0.3 + -8 * 16 + "px";
    image6El.style.bottom = -(value * 0.25) + "px";
  });
}
//----------------------CONNEXION AFFICHAGE----------------------//

const rows = 3;
const columns = 3;

let currentTile;
let otherTile;
let has_right = false;

const button = document.getElementById("submit-button");
const buttonIcon = document.getElementById("submit-icon");

const blurEl = document.querySelector(".blur-el");
const createAccountEl = document.querySelector(".createAccount-el");
const passwordAccountEl = document.querySelector(".passwordAccount-el");
const backgroundEl = document.querySelector(".background");
const bodyEl = document.querySelector("body");

function login() {
  blurEl.style.filter = "blur(5px)";

  if (
    document.getElementsByClassName("createAccount-el").length > 0 ||
    document.getElementsByClassName("passwordAccount-el").length > 0
  ) {
    bodyEl.removeChild(bodyEl.firstChild);
  }

  if (!(document.getElementsByClassName("login-el").length > 0)) {
    const loginAccountEl = document.createElement("div");

    loginAccountEl.setAttribute("class", "login-el");

    loginAccountEl.innerHTML =
      "<h1>Connexion</h1>" +
      '<form class="login-form">' +
      '<input class="input-el email-el" name="email" type="email" placeholder="Identifiant" />' +
      '<input class="input-el password-el" name="password" type="password" placeholder="Mot de passe" />' +
      '<button class="form-submit-yes" id="submit-button">' +
      '<i id="submit-icon" class="fa-solid fa-check"></i>' +
      "</button>" +
      "</form>" +
      '<p onclick="passwordAccount()" class="forget-password-el">mot de passe oublié</p>' +
      "<br />" +
      '<p onclick="createAccount()" class="create-account-el">créer un compte</p>';

    bodyEl.insertBefore(loginAccountEl, bodyEl.children[0]);
  }
}

function createAccount() {
  if (
    document.getElementsByClassName("login-el").length > 0 ||
    document.getElementsByClassName("passwordAccount-el").length > 0
  ) {
    bodyEl.removeChild(bodyEl.firstChild);
  }

  const createAccountEl = document.createElement("div");
  createAccountEl.setAttribute("class", "createAccount-el");

  createAccountEl.innerHTML =
    '<i onclick="login()" class="fa-2xl fa-solid fa-angle-left"></i>' +
    "<h1>Inscription</h1>" +
    '<form class="createAccount-form" action="verifications/create_account_verification.php" method="post">' +
    '<input class="input-create-el nickname-el" name="nickname" type="text" placeholder="Pseudo" />' +
    '<input class="input-create-el password-el" name="password" type="password" placeholder="Mot de passe" />' +
    '<input class="input-create-el rePassword-el" name="repassword" type="password" placeholder="Encore une fois !" />' +
    '<input class="input-create-el email-el" name="email" type="email" placeholder="Email" />' +
    '<div id="board"></div>' +
    '<button class="form-submit-no" id="submit-button"><i id="submit-icon" class="fa-solid fa-xmark"></i></button>' +
    "</form>";

  bodyEl.insertBefore(createAccountEl, bodyEl.children[0]);

  generatePuzzle();
}

function passwordAccount() {
  bodyEl.removeChild(bodyEl.firstChild);

  const passwordAccountEl = document.createElement("div");
  passwordAccountEl.setAttribute("class", "passwordAccount-el");

  passwordAccountEl.innerHTML =
    '<i onclick="login()" class="fa-2xl fa-solid fa-angle-left"></i>' +
    '<form class="passwordAccount-form">' +
    '<h1 class="passwordAccountTitle-el">Récupération de mot de passe</h1>' +
    '<input class="input-el email-el" name="email" type="email" placeholder="Saisissez votre email de récupération" />' +
    '<button class="form-submit-yes" id="submit-button"><i id="submit-icon" class="fa-solid fa-check"></i></button>' +
    '<p class="contact-us-el">Contacter le support</p>' +
    "</form>";

  bodyEl.insertBefore(passwordAccountEl, bodyEl.children[0]);
}

function fermer() {
  if (
    document.getElementsByClassName("login-el").length > 0 ||
    document.getElementsByClassName("createAccount-el").length > 0 ||
    document.getElementsByClassName("passwordAccount-el").length > 0
  ) {
    bodyEl.removeChild(bodyEl.firstChild);
    blurEl.style.filter = "blur(0)";
  }
}

// CAPTCHA PUZZLE //

function shuffleArray(arr) {
  arr.sort(() => Math.random() - 0.5);
}

let arrayPuzzle = ["1", "2", "3", "4", "5", "6", "7", "8", "9"];

function generatePuzzle() {
  shuffleArray(arrayPuzzle);

  for (let i = 0; i < rows; i++) {
    for (let j = 0; j < columns; j++) {
      let tile = document.createElement("img");
      tile.id = i.toString() + "-" + j.toString();
      tile.src = "puzzle/" + arrayPuzzle.shift() + ".png";
      document.getElementById("board").appendChild(tile);

      tile.addEventListener("dragstart", dragStart);
      tile.addEventListener("dragover", dragOver);
      tile.addEventListener("dragenter", dragEnter);
      tile.addEventListener("dragleave", dragLeave);
      tile.addEventListener("drop", dragDrop);
      tile.addEventListener("dragend", dragEnd);
    }
  }
}

function dragStart() {
  currentTile = this;
}

function dragOver(e) {
  e.preventDefault();
}

function dragEnter(e) {
  e.preventDefault();
}

function dragLeave() {}

function dragDrop() {
  otherTile = this;
}

function dragEnd() {
  let currentImg = currentTile.src;
  let otherImg = otherTile.src;

  currentTile.src = otherImg;
  otherTile.src = currentImg;

  verificationAll();
}

function verificationAll() {
  if (document.getElementsByClassName("createAccount-el").length > 0) {
    if (
      document.getElementById("0-0").src ==
        "http://localhost:81/Projet%20annuel%20RETROSPECTIVE/puzzle/1.png" &&
      document.getElementById("0-1").src ==
        "http://localhost:81/Projet%20annuel%20RETROSPECTIVE/puzzle/2.png" &&
      document.getElementById("0-2").src ==
        "http://localhost:81/Projet%20annuel%20RETROSPECTIVE/puzzle/3.png" &&
      document.getElementById("1-0").src ==
        "http://localhost:81/Projet%20annuel%20RETROSPECTIVE/puzzle/4.png" &&
      document.getElementById("1-1").src ==
        "http://localhost:81/Projet%20annuel%20RETROSPECTIVE/puzzle/5.png" &&
      document.getElementById("1-2").src ==
        "http://localhost:81/Projet%20annuel%20RETROSPECTIVE/puzzle/6.png" &&
      document.getElementById("2-0").src ==
        "http://localhost:81/Projet%20annuel%20RETROSPECTIVE/puzzle/7.png" &&
      document.getElementById("2-1").src ==
        "http://localhost:81/Projet%20annuel%20RETROSPECTIVE/puzzle/8.png" &&
      document.getElementById("2-2").src ==
        "http://localhost:81/Projet%20annuel%20RETROSPECTIVE/puzzle/9.png"
    ) {
      has_right = true;

      document.getElementById("submit-button").setAttribute("type", "submit");
      document.getElementById("submit-button").className = "form-submit-yes";
      document.getElementById("submit-button").style.transform =
        "rotate(360deg)";
      setTimeout(function () {
        document.getElementById("submit-icon").className = "fa-solid fa-check";
      }, 200);
    } else {
      if (document.getElementById("submit-button").hasAttribute("type")) {
        document.getElementById("submit-button").removeAttribute("type");
      }
      document.getElementById("submit-button").className = "form-submit-no";
      if (has_right) {
        document.getElementById("submit-button").style.transform =
          "rotate(-360deg)";
      }
      setTimeout(function () {
        document.getElementById("submit-icon").className = "fa-solid fa-xmark";
      }, 200);
    }
  }
}
