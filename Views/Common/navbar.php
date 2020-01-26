<nav class='navbar navbar-expand-md navbar-light bg-light sticky-top'>
    <div class='container-fluid'>
        <a class='navbar-brand' href='?page=home'><i class='fas fa-dice'></i><span class='logoName'>g a m e d e r</span></a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarResponsive'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarResponsive'>
            <ul class='navbar-nav ml-auto'>
                <?php if ($_SESSION['role'] === 2) { echo "<li class='nav-item'>
                    <a class='nav-link active' href='?page=adminpanel'><i class='fas fa-user-shield'></i> Admin Panel</a>
                </li>";}?>
                <li class='nav-item'>
                    <a class='nav-link active' href='?page=profile'><i class='fas fa-user-alt'></i> Profile</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='?page=mygames'><i class='fas fa-chess-knight'></i> Games</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='?page=messages'><i class='fas fa-comments'></i> Messages</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='?page=settings'><i class='fas fa-cog'></i> Settings</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='?page=logout'><i class='fas fa-sign-out-alt'></i> Logout </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
