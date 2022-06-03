//----------------------BACKGROUND PARALLAXE----------------------//

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

//----------------------CONNEXION AFFICHAGE----------------------//

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
      '<button class="button-submit-el" type="submit">' +
      '<i class="fa-solid fa-check"></i>' +
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
    '<h1>Inscription</h1>' +
    '<p class="message-el <?php if(isset($_GET[\'type\'])){echo $_GET[\'type\'];}?>">'+
    ' <?php if(isset($_GET["message_createAccount"])){echo $_GET[\'message_createAccount\'];}?>' +
    '</p>'+
    '<form class="createAccount-form" action="verifications/create_account_verification.php" method="post">' +
    '<input class="input-create-el nickname-el" name="nickname" type="text" placeholder="Pseudo" />' +
    '<input class="input-create-el password-el" name="password" type="password" placeholder="Mot de passe" />' +
    '<input class="input-create-el rePassword-el" name="repassword" type="password" placeholder="Encore une fois !" />' +
    '<input class="input-create-el email-el" name="email" type="email" placeholder="Email" />' +
    '<button class="button-reSubmit-el" type="submit">' +
    ' <i class="fa-solid fa-check"></i>' +
    " </button>" +
    " </form>";

  bodyEl.insertBefore(createAccountEl, bodyEl.children[0]);
}

function passwordAccount() {
  bodyEl.removeChild(bodyEl.firstChild);

  const passwordAccountEl = document.createElement("div");
  passwordAccountEl.setAttribute("class", "passwordAccount-el");

  passwordAccountEl.innerHTML =
    '<i onclick="login()" class="fa-2xl fa-solid fa-angle-left"></i>' +
    '<form class="passwordAccount-form">' +
    '<h1 class="passwordAccountTitle-el">Récupération de mot de passe</h1>' +
    ' <input class="input-el email-el" name="email" type="email" placeholder="Saisissez votre email de récupération" />' +
    ' <button class="button-passwordSubmit-el" type="submit">' +
    '   <i class="fa-solid fa-check"></i>' +
    "  </button>" +
    ' <p class="contact-us-el">Contacter le support</p>' +
    " </form>";

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
