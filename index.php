<?php session_start() ?>
<!DOCTYPE html>

<html>
<?php
$title = 'Accueil';
include("includes/head.php") ?>

<body>
    <?php
    include("includes/header.php");
    ?>
    <div class="login-el">
        <h1>Connexion</h1>
        <form class="login-form" action="verifications/connection_verification.php" method="post">
            <input class="input-el email-el" name="email" type="email" placeholder="Identifiant" />
            <input class="input-el password-el" name="password" type="password" placeholder="Mot de passe" />
            <button class="form-submit-yes" id="submit-button-login">
                <i id="submit-icon-login" class="fa-solid fa-check"></i>
            </button>
        </form>
        <p onclick="passwordAccount()" class="forget-password-el">mot de passe oublié</p>
        <br />
        <p onclick="createAccount()" class="create-account-el">créer un compte</p>
    </div>
    <div class="createAccount-el">
        <i onclick="login()" class="fa-2xl fa-solid fa-angle-left"></i>
        <h1>Inscription</h1>
        <form class="createAccount-form" action="verifications/create_account_verification.php" method="post">
            <input class="input-create-el nickname-el" name="nickname" type="text" placeholder="Pseudo" />
            <input class="input-create-el password-el" name="password" type="password" placeholder="Mot de passe" />
            <input class="input-create-el rePassword-el" name="repassword" type="password" placeholder="Encore une fois !" />
            <input class="input-create-el email-el" name="email" type="email" placeholder="Email" />
            <div id="board"></div>
            <button class="form-submit-no" id="submit-button-create"><i id="submit-icon-create" class="fa-solid fa-xmark"></i></button>
        </form>
    </div>
    <div class="passwordAccount-el">
        <i onclick="login()" class="fa-2xl fa-solid fa-angle-left"></i>
        <form class="passwordAccount-form">
            <h1 class="passwordAccountTitle-el">Récupération de mot de passe</h1>
            <input class="input-el email-el" name="email" type="email" placeholder="Saisissez votre email de récupération" />
            <button class="form-submit-yes" id="submit-button-password"><i id="submit-icon-password" class="fa-solid fa-check"></i></button>
            <p class="contact-us-el">Contacter le support</p>
        </form>
    </div>

    <main onclick="fermer()" class="blur-el">
        <div class="background-index container-fluid">
            <img class="image1" src="img/retrospective-text.png" />
            <img class="image2" src="img/reflect.png" />
            <img class="image3" src="img/sun.png" />
            <img class="image4" src="img/front-moutain.png" />
            <img class="image5" src="img/back-moutain.png" />
            <img class="image6" src="img/stars.png" />
        </div>
        <div class="presentation-div information-div container-fluid">
            <div class="information-row row">
                <div class="information-write col-md-8">
                    <h1 class="mt-3 mb-4">QUI SOMMES NOUS ?</h1>
                    <p>
                        Retrospective est une plateforme de partages qui accueille les
                        plus passionnés et talentueux d’entre vous. Du plus novice au
                        vétéran du code, de l’art et de la création, vous êtes tous la
                        bienvenue dans notre domaine : la Retrospective.
                    </p>
                </div>
                <img class="col-md-4 sonic" src="img/sonic_charac.png" />
            </div>
        </div>
        <div class="games-div carousel-div container-fluid">
            <h1>NOS DERNIÈRES SORTIES</h1>
            <div id="gamesCarousel" class="slide-carousel carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#gamesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#gamesCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#gamesCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-window carousel-item active">
                        <img src="img/sonic.png" class="d-block w-100" />
                    </div>
                    <div class="carousel-window carousel-item">
                        <img src="img/mario.png" class="d-block w-100" />
                    </div>
                    <div class="carousel-window carousel-item">
                        <img src="img/donkeykong.png" class="d-block w-100" />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#gamesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#gamesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <p>
                Juste au dessus, les jeux de nos tous derniers gagnants ! Si vous le
                souhaitez, vous pouvez aussi participer pour avoir votre merveilleux
                jeu dans notre vitrine.
            </p>
        </div>
        <div class="splashArt-div carousel-div container-fluid">
            <h1>LES SPLASH ART</h1>
            <div id="splashArtCarousel" class="slide-carousel carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#splashArtCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#splashArtCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#splashArtCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-window carousel-item active">
                        <img src="img/super-sonic.png" class="d-block w-100" />
                    </div>
                    <div class="carousel-window carousel-item">
                        <img src="img/mario.png" class="d-block w-100" />
                    </div>
                    <div class="carousel-window carousel-item">
                        <img src="img/donkeykong.png" class="d-block w-100" />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#splashArtCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#splashArtCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <p>
                Cette fois-ci, la vitrine des plus beaux splash art de nos chers
                gagnants. Votés par le jury ainsi que les utilisateurs de
                Retrospective.
            </p>
        </div>
        <div class="need-div information-div container-fluid">
            <div class="information-row row">
                <div class="information-write col-md-8">
                    <h1 class="mt-3 mb-4">ON A BESOIN DE VOUS !</h1>
                    <p>
                        Notre équipe est actuellement composée de 3 codeurs d’exception,
                        seulement, l’objectif de Retrospective est d’agrandir notre champ
                        de fonctionnalités afin d’y incorporer +++ de fun. Voilà pourquoi
                        nous voulons recruter les plus créatifs d’entre vous.<br />
                        <br />
                        Hâte de vous voir parmi nous -> <a href="apply.php">ici</a>
                    </p>
                </div>
                <img class="col-md-4 sonic" src="img/mario_charac.png" />
            </div>
        </div>
    </main>
    <?php include("includes/footer.php") ?>
    <script src="js/index.js"></script>
</body>

</html>