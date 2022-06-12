<?php

$q = 'SELECT * FROM USERS';
$req = $bdd->prepare($q);
$req->execute();
$results = $req->fetchAll();

$c = 'SELECT * FROM USER_AVATAR';
$req = $bdd->prepare($c);
$req->execute();
$results_avatar= $req->fetchAll();
?>

<div class="row">
    <form action="verifications/admin_users_verif.php" method="post" enctype="multipart/form-data" id="admin-user-form">
        <table class="table table-striped table-dark table-hover table-sm align-middle table-responsive">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Nickname</th>
                    <th scope="col">Avatar</th>
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
            $date = explode('-', $value['creation_date']);
            echo 
            '<tr class="row' . $value['id'] . '">
                <th scope="row">' . $value['id'] . '</td>
                <td class="col emailtd">' . $value['email'] . '</td>
                <td class="col">' . $value['nickname'] . '</td>';
                foreach($results_avatar as $key2 => $value2){
                    if ($value2['users']==$value['id']) {
                    echo '<td class="avatar"><img class="img-in" src="uploads/'. $value2['avatar_assets'] . '.png"></td>';
                    }
                }
                echo
                '<td class="col">' . $value['phone'] . '</td>
                <td class="col">' . $value['first_name'] . '</td>
                <td class="col">' . $value['last_name'] . '</td>
                <td>' . $value['birth_date'] . '</td>
                <td>' . $value['status'] . '</td>
                <td>' . $value['region'] . '</td>
                <td class="col">' . $value['gender'] . '</td>
                <td class="col">' . $value['creation_date'] . '</td>
                <td class="col-1">
                    <button type="button" class="btn btn-outline-warning btn-sm">Warn</button>
                    <button type="button" class="btn btn-outline-danger btn-sm">Ban</button>
                    <button type="button" class="btn btn-outline-info btn-sm" onclick="admin_edit(\'.row' . $value['id'] . '\')">Edit</button> 
                </td>
            </tr>';
        }
        ?>

        </table>
    </form>
</div>