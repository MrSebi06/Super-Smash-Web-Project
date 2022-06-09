<!DOCTYPE html>
<html>
    <?php 
    $title = 'Admin';
    include('includes/head.php');
    ?>

    <body class="admin">
        <?php include('includes/header.php');?>
        
        <main>
            <?php
            
            if(!isset($_GET['page']) || empty($_GET['page'])){
                $_GET['page'] = 'resume';
            }

            $resume = ($_GET['page'] == 'resume') ? 'active' : '';
            $users = ($_GET['page'] == 'users') ? 'active' : '';
            $posts = ($_GET['page'] == 'posts') ? 'active' : '';
            $medias = ($_GET['page'] == 'medias') ? 'active' : '';
            $home = ($_GET['page'] == 'home') ? 'active' : '';
            $events = ($_GET['page'] == 'events') ? 'active' : '';

            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-1">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center rounded">
                            <ul class="nav nav-pills flex-lg-column nav-fill admin-nav">
                                <li class="nav-item">
                                    <a class="nav-link text-light <?= $resume?>" href="admin.php?page=resume">Resume</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light <?= $users?>" href="admin.php?page=users">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light <?= $posts?>" href="admin.php?page=posts">Posts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light <?= $medias?>" href="admin.php?page=medias">Medias</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light <?= $home?>" href="admin.php?page=home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light <?= $events?>" href="admin.php?page=events">Events</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-lg">
                        <h1 class="bg-primary row rounded no-gutters"><?= ucfirst($_GET['page'])?></h1>
                        <?php 
                        include('includes/db.php');
                        include('includes/admin/admin_' . $_GET['page'] . '.php');
                        ?>
                    </div>
                </div>
            </div>  
        </main>

        <?php include('includes/footer.php');?>

        <script type="text/javascript" src="js/admin.js"></script>
    </body>
</html>