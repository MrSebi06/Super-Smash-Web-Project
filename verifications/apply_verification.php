<?php

    if (isset($_POST['firstName']) && !empty($_POST['firstName'])) {
        setcookie('firstName', $_POST['firstName'], time() + 3600 * 24);
    }
    if (isset($_POST['lastName']) && !empty($_POST['lastName'])) {
        setcookie('lastName', $_POST['lastName'], time() + 3600 * 24);
    }
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        setcookie('email', $_POST['email'], time() + 3600 * 24);
    }
    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
        setcookie('phone', $_POST['phone'], time() + 3600 * 24);
    }
    if (isset($_POST['area1']) && !empty($_POST['area1'])) {
        setcookie('area1', $_POST['area1'], time() + 3600 * 24);
    }
    if (isset($_POST['area2']) && !empty($_POST['area2'])) {
        setcookie('area2', $_POST['area2'], time() + 3600 * 24);
    }
    if (isset($_POST['linkedIn']) && !empty($_POST['linkedIn'])) {
        setcookie('linkedIn', $_POST['linkedIn'], time() + 3600 * 24);
    }
    if (isset($_POST['portflio']) && !empty($_POST['portflio'])) {
        setcookie('portflio', $_POST['portflio'], time() + 3600 * 24);
    }

    if(
        !isset($_POST['firstName']) || empty($_POST['firstName']) ||
        !isset($_POST['lastName'])  || empty($_POST['lastName'])  ||
        !isset($_POST['email'])     || empty($_POST['email'])     ||
        !isset($_FILES['cv'])       || empty($_FILES['cv'])       ||
        !isset($_POST['area1'])     || empty($_POST['area1'])     ||
        !isset($_POST['area2'])     || empty($_POST['area2'])){
            header('location: ../apply.php?message=Veuillez remplir les champs obligatoires&type=alert');
            exit;
        }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        header('location: ../apply.php.php?message=Email invalide.&type=alert');
        exit;
    }

    if(!preg_match('/^0[1678]([\.\-]?([0-9]{2}){4}$)/', $_POST['phone'])){
        header('location: ../apply.php?message=Veuillez entrer un numéro valide.&type=alert');
        exit;
    }

    if($_FILES['cv']['error'] == 0){
        $acceptable = [
            'image/pdf',
            'image/png',
            'image/jpeg'
        ];

        if(!in_array($_FILES['cv']['type'], $acceptable)){
            header('location: ../apply.php?message= Format de cv invalide.&type= alert');
            exit;
        }

        $maxSize = 2 * 1024 * 1024;
        if($_FILES['cv']['size'] > $maxSize){
            header('location: ../apply.php?message= Fichier trop lourd (2Mo max).&type=alert');
            exit;
        }

        $chemin = 'uploads'; 
        if (!file_exists($chemin)) { 
            mkdir($chemin); 
        }

        $chemin = 'uploads/cv'; 
        if (!file_exists($chemin)) { 
            mkdir($chemin); 
        }
        $array = explode('.', $_FILES['cv']['name']); 
        $extension = end($array); 
        $filename = 'cv-' . time() . '.' . $extension;
        $destination = $chemin . '/' . $filename;
        move_uploaded_file($_FILES['cv']['tmp_name'], $destination);
    }   

    include('includes/db.php');
    $q = 'INSERT INTO apply_form(first_name,last_name,email,phone,cv,experience_redaction,comfortable_redaction,linkedIn_url,portfolio_url,user)
          VALUES(:first_name,:last_name,:email,:phone,:cv,:experience_redaction,:comfortable_redaction,:linkedIn_url,:portfolio_url,:user)';
    $req = $bdd -> prepare($q);
    $result = $req -> execute([
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'cv' => $filename,
        'experience_redaction' => $_POST['experience_redaction'],
        'comfortable_redaction' => $_POST['comfortable_redaction'],
        'linkedIn_url' => (!empty($_POST['linkedIn']) && isset($_POST['linkedIn']) ? $_POST['linkedIn'] : ''),
        'portfolio_url' => (!empty($_POST['portflio']) && isset($_POST['portflio']) ? $_POST['portflio'] : '')
    ]);

    if (!$result) {
        header('location: ../apply.php.php?message=Le cv n\'a pas été envoyé suite à une erreur.&type=alert');
        exit;
    } else {
        header('location: ../apply.php.php?message=CV envoyé avec succès.&type=success');
        exit;
    }
?>