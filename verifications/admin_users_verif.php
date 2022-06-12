<?php

var_dump($_POST);

include('../includes/db.php');

$q = 'UPDATE USERS SET email = :mail, nickname = :nickname, phone = :phone, first_name = :first_name, last_name = :last_name, birth_date = :birth_date, status = :status, region = :region, gender = :gender, creation_date = :creation_date WHERE id = :id';
$req = $bdd->prepare($q);
$req->execute([
    'mail' => (empty($_POST[0])) ? null : $_POST[0],
    'nickname' => (empty($_POST[1])) ? null : $_POST[1],
    'phone' => (empty($_POST[3])) ? null : $_POST[3],
    'first_name' => (empty($_POST[4])) ? null : $_POST[4],
    'last_name' => (empty($_POST[5])) ? null : $_POST[5],
    'birth_date' => (empty($_POST[6])) ? null : $_POST[6],
    'status' => (empty($_POST[7])) ? null : $_POST[7],
    'region' => (empty($_POST[8])) ? null : $_POST[8],
    'gender' => (empty($_POST[9])) ? null : $_POST[9],
    'creation_date' => (empty($_POST[10])) ? null : $_POST[10],
    'id' => $_POST['id']
]);
$results = $req->fetchAll();

header('location: ../admin.php?page=users');

?>