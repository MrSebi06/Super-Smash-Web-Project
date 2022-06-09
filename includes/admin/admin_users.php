<?php

$q = 'SELECT * FROM USERS';
$req = $bdd->prepare($q);
$req->execute();
$results = $req->fetchAll();
?>

<div class="row">
    <table class="table table-striped table-dark table-hover table-sm align-middle">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Mail</th>
                <th scope="col">Nickname</th>
                <th scope="col">Phone</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Birth date</th>
                <th scope="col">Status</th>
                <th scope="col">Region</th>
                <th scope="col">Gender</th>
                <th scope="col">Creation date</th>
                <th scope="col">Options</th>
            </tr>
        </thead>

    <?php

    foreach($results as $key => $value){
        echo 
        '<tr class="row' . $value['id'] . '">
            <th scope="row">' . $value['id'] . '</td>
            <td>' . $value['email'] . '</td>
            <td>' . $value['nickname'] . '</td>
            <td>' . $value['phone'] . '</td>
            <td>' . $value['first_name'] . '</td>
            <td>' . $value['last_name'] . '</td>
            <td>' . $value['birth_date'] . '</td>
            <td>' . $value['status'] . '</td>
            <td>' . $value['region'] . '</td>
            <td>' . $value['gender'] . '</td>
            <td>' . $value['creation_date'] . '</td>
            <td><button type="button" class="btn btn-outline-info btn-sm" onclick="admin_edit(\'.row' . $value['id'] . '\')">Edit</button> <button type="button" class="btn btn-outline-warning btn-sm">Warn</button> <button type="button" class="btn btn-outline-danger btn-sm">Ban</button></td>
        </tr>';
    }

    ?>

    </table>
</div>