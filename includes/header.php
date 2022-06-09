<header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img class="logo" src="./img/logo.svg" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="links-container collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <div class="pages-link">
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($title == 'Accueil') ? 'active' : ''; ?>" aria-current="page" href="#">HOME</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="arcadeDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    ARCADE
                                </a>
                                <ul class="gamesDropdownList dropdown-menu" aria-labelledby="arcadeDropdownMenu">
                                    <li><a class="dropdown-item" href="#">Morpion</a></li>
                                    <li><a class="dropdown-item" href="#">Snake</a></li>
                                    <li><a class="dropdown-item" href="#">Pacman</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">LOUNGE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">EVENTS</a>
                            </li>
                        </div>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="languageDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="language-link fa-solid fa-language"></i>
                            </a>
                            <ul class="languagesDropdownList dropdown-menu" aria-labelledby="languageDropdownMenu">
                                <li><a class="dropdown-item" href="#">Français</a></li>
                                <li><a class="dropdown-item" href="#">English</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="userDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="user-link fa-solid fa-user-astronaut"></i>
                            </a>
                            <ul class="userDropdownList dropdown-menu" aria-labelledby="userDropdownMenu">
                                <li><a class="dropdown-item" href="#">Avatar</a></li>
                                <li><a class="dropdown-item" href="#">Profil</a></li>
                                <li><a class="dropdown-item" href="#">Stats</a></li>
                                <li><a class="dropdown-item" href="#">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>