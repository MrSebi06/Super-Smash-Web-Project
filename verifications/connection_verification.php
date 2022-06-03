<?php

    if(isset($_POST['email']) && !empty($_POST['email'])){
        setcookie('email', $_POST['email'], time() + 3600 * 24);
    }

    if(!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password'])){
        header('location: ../index.php?message_connection=Veuillez remplir les deux champs.&type=alert');
        exit;
    }

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        header('location: ../index.php?message_connection=Email invalide.&type=alert');
        exit;
    }

    include('../includes/db.php');

    $salt = '$c53.*?é';
    $salted_password = hash('sha256', $_POST['password'] . $salt);


    $q = 'SELECT email FROM users WHERE email = :email AND password = :password';
    $req = $bdd -> prepare($q);
    $req -> execute(['email' => $_POST['email'], 'password' => $salted_password]);
    $res = $req -> fetch(PDO::FETCH_ASSOC);

    if(empty($res)){
        header('location: ../index.php?message_connection=Identifiants incorrects.&typeConnection=alert');
        exit;
    }

    session_start();
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['id'] =  $res['id'];
    header('location: ../index.php');
    exit;
?>


