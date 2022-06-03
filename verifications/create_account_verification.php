<?php

if (isset($_POST['nickname']) && !empty($_POST['nickname'])) {
    setcookie('nickname', $_POST['nickname'], time() + 3600 * 24);
}

if (isset($_POST['email']) && !empty($_POST['email'])) {
    setcookie('email', $_POST['email'], time() + 3600 * 24);
}

if (!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password'])) {
    header('location: ../index.php?message_createAccount=Veuillez remplir les deux champs.&type=alert');
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('location: ../index.php?message_createAccount=Email invalide.&type=alert');
    exit;
}

if (strlen($_POST['password']) < 8 || !preg_match('/[A-Z]/', $_POST['password']) || !preg_match('/[0-9]/', $_POST['password'])) {
    header('location: ../index.php?message_createAccount=Veuillez entrer un mot de passe avec au moins 8 caractères dont une majuscule, une minuscule et un chiffre.&type=alert');
    exit;
}

if($_POST['password'] != $_POST['repassword']){
    header('location: ../index.php?message_createAccount=Les mots de passe ne sont pas identiques.&type=alert');
    exit;
}

include('../includes/db.php');

$q = 'SELECT email FROM users WHERE email = ?';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);
$res = $req->fetchAll();

if (!empty($res)) {
    header('location: ../index.php?message_createAccount=Email déjà utilisé.&type=alert');
    exit;
}

$q = 'SELECT nickname FROM users WHERE nickname = ?';
$req = $bdd->prepare($q);
$req->execute([$_POST['nickname']]);
$res = $req->fetchAll();

if (!empty($res)) {
    header('location: ../index.php?message_createAccount=Pseudo déjà utilisé.&type=alert');
    exit;
}


$salt = '$c53.*?é';
$salted_password = hash('sha256', $_POST['password'] . $salt);

$q = 'INSERT INTO users(nickname, email, password) VALUES (:nickname, :email,:password)';
$req = $bdd->prepare($q);
$result = $req->execute(['nickname' => $_POST['nickname'], 'email' => $_POST['email'], 'password' => $salted_password]);

if (!$result) {
    header('location: ../index.php?message_createAccount=Création du compte échouée.&type=alert');
    exit;
};

$q = 'SELECT email FROM users WHERE email = :email AND password = :password';
    $req = $bdd -> prepare($q);
    $req -> execute(['email' => $_POST['email'], 'password' => $salted_password]);
    $res = $req -> fetch(PDO::FETCH_ASSOC);

session_start();
$_SESSION['email'] = $_POST['email'];
$_SESSION['id'] =  $res['id'];
header('location: ../index.php');
exit;
