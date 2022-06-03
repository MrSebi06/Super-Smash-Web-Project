<header>
    <nav class="navbar navbar-expand-lg">
        <a><img class="logo" src="./img/logo.svg" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navigation collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">HOME</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ARCADE </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Morpion</a>
                        <a class="dropdown-item" href="#">Snake</a>
                        <a class="dropdown-item" href="#">Pacman</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">LOUNGE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">EVENTS</a>
                </li>
                <li class="language-nav-item nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-language"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                        <a class="dropdown-item" href="#">Français</a>
                        <a class="dropdown-item" href="#">English</a>
                    </div>
                </li>
                <?php echo !isset($_SESSION['email']) ? 
                
                '
                <li class="connexion-nav-item nav-item">
                <a class="nav-link" onclick="login()">
                    <i class="fa-solid fa-user-astronaut"></i>
                </a>
                </li>
                ' 
                
                : 
                
                '<li class="connexion-nav-item nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-user-astronaut"></i>
                    </a>
                    <div class="dropdown-menu-profile dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                        <a class="dropdown-item" href="#">Avatar</a>
                        <a class="dropdown-item" href="#">Profil</a>
                        <a class="dropdown-item" href="#">Stats</a>
                        <a class="dropdown-item" href="verifications/logout.php">Déconnexion</a>
                    </div>
                </li>' 
                ?>
                
            </ul>
        </div>
    </nav>
</header>