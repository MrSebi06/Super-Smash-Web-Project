<?php
$q = 'SELECT 
    (SELECT COUNT(*) FROM USERS) AS count_users, 
    (SELECT COUNT(*) FROM POST) AS count_post, 
    (SELECT COUNT(*) FROM MEDIA_POST) AS count_mediaP,
    (SELECT COUNT(*) FROM MEDIA_COMMENT) AS count_mediaC;';
$req = $bdd->prepare($q);
$req->execute();
$results = $req->fetchAll();
?>

<table class="table table-dark align-middle">
    <thead>
        <tr>
            <th></th>
        </tr>
</table>