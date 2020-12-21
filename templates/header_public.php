<!DOCTYPE html>
    </head>

    <body>
        <header>
            <nav class="header">
                <a href="index.php"><img id="logo" src="images/logo.png" alt="logo"></a>
                <?php if ($_SESSION['roleUserLoggedIn'] == false ) { ?>
                <a class="actions" id = "buttonLogin" href="login.php">Login</a>
                
                <?php } else { ?>
                <a class="actions" id = "buttonLogout" href="action_logout.php">Logout</a>
                <a class="actions" href="my_events.php">Dashboard</a>
                <a id = "nameUser" class="trailing">Welcome back, <b><?=$_SESSION['nameUserLoggedIn']?>!</b></a>
                
                <?php } ?>
                <a class="actions" href="registration.php?role=Organizer">Become an Organizer</a>
                <a class="actions" href="events_now.php?page=1">Events</a>
                <a class="actions" href="about.php">About</a> 
            </nav>
        </header>
 
