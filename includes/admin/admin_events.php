<?php

echo
'
    <div class="container-fluid">
        <div class="row">
            <div class="col col-5">
            <h1>CURRENT</h1>
                <table class="table table-striped table-dark table-hover table-sm align-middle">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Start</th>
                        <th scope="col">End</th>
                        </tr>
                    </thead>
                    <tbody>
                        ';
include("includes/db.php");

$q = 'SELECT id, title, description, start_date, end_date FROM event WHERE start_date <= NOW() AND end_date > NOW()';
$req = $bdd->query($q);
$result = $req->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $key) {
    echo '<tr>';
    echo '<td>' . $key['id'] . '</td>';
    echo '<td>' . $key['title'] . '</td>';
    echo '<td>' . $key['description'] . '</td>';
    echo '<td>' . $key['start_date'] . '</td>';
    echo '<td>' . $key['end_date'] . '</td>';
    echo '</tr>';
}

echo '
                    </tbody>
                </table>
            </div>
            
            <div class="col col-5">
            <h1>UPCOMING</h1>
                <table class="table table-striped table-dark table-hover table-sm align-middle">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Start</th>
                        </tr>
                    </thead>
                    <tbody>
                        ';

$q = 'SELECT id, title, description, start_date FROM event WHERE start_date > NOW()';
$req = $bdd->query($q);
$result = $req->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $key) {
    echo '<tr>';
    echo '<td>' . $key['id'] . '</td>';
    echo '<td>' . $key['title'] . '</td>';
    echo '<td>' . $key['description'] . '</td>';
    echo '<td>' . $key['start_date'] . '</td>';
    echo '</tr>';
}

echo '
                    </tbody>
                </table>
            </div>
            
            <div class="col col-2">
            <h1>PASTED</h1>

                <table class="table table-striped table-dark table-hover table-sm align-middle">
                    <thead>
                        <tr>
                        <th scope="col">Title</th>
                        <th scope="col">End</th>
                        </tr>
                    </thead>
                    <tbody>
                        ';
$q = 'SELECT title, end_date FROM event WHERE end_date < NOW()';
$req = $bdd->query($q);
$result = $req->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $key) {
    echo '<tr>';
    echo '<td>' . $key['title'] . '</td>';
    echo '<td>' . $key['end_date'] . '</td>';
    echo '</tr>';
}

echo '
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    ';
?>