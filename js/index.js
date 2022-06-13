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
const loginEl = document.querySelector(".login-el");
const createAccountEl = document.querySelector(".createAccount-el");
const passwordAccountEl = document.querySelector(".passwordAccount-el");
const backgroundEl = document.querySelector(".background");
const bodyEl = document.querySelector("body");

function login() {
  blurEl.style.filter = "blur(5px)";
  createAccountEl.style.display = "none";
  passwordAccountEl.style.display = "none";
  loginEl.style.display = "block";
  cleanPuzzle();
}

function createAccount() {
  loginEl.style.display = "none";
  passwordAccountEl.style.display = "none";
  createAccountEl.style.display = "block";
  generatePuzzle();
}

function passwordAccount() {
  loginEl.style.display = "none";
  createAccountEl.style.display = "none";
  passwordAccountEl.style.display = "block";
  cleanPuzzle();
}

function fermer() {
  loginEl.style.display = "none";
  createAccountEl.style.display = "none";
  passwordAccountEl.style.display = "none";
  blurEl.style.filter = "blur(0)";
  cleanPuzzle();
}

// CAPTCHA PUZZLE //

function shuffleArray(arr) {
  arr.sort(() => Math.random() - 0.5);
}


function generatePuzzle() {
  let arrayPuzzle = ["1", "2", "3", "4", "5", "6", "7", "8", "9"];
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

function cleanPuzzle() {
  document.getElementById("board").innerHTML = "";
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

      document
        .getElementById("submit-button-create")
        .setAttribute("type", "submit");
      document.getElementById("submit-button-create").className =
        "form-submit-yes";
      document.getElementById("submit-button-create").style.transform =
        "rotate(360deg)";
      setTimeout(function () {
        document.getElementById("submit-icon-create").className = "fa-solid fa-check";
      }, 200);
    } else {
      if (
        document.getElementById("submit-button-create").hasAttribute("type")
      ) {
        document.getElementById("submit-button-create").removeAttribute("type");
      }
      document.getElementById("submit-button-create").className =
        "form-submit-no";
      if (has_right) {
        document.getElementById("submit-button-create").style.transform =
          "rotate(-360deg)";
      }
      setTimeout(function () {
        document.getElementById("submit-icon-create").className = "fa-solid fa-xmark";
      }, 200);
    }
  }
}
