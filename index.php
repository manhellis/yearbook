<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once 'db.php';

// inefficient query but fine for small db
// could use another method but as long as we have sparse ids
// we would need some pretty serious overhead to make it truly random and efficient
// good article on the topic: https://jan.kneschke.de/projects/mysql/order-by-rand/
$res = $mySQLiconn->query(
    "SELECT photo
    FROM new_students 
    WHERE photo IS NOT NULL AND photo <> ''
    ORDER BY RAND()
    LIMIT 2;"
);

$images = $res->fetch_all();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/global.css" />
    <link rel="stylesheet" href="./styles/homepage.css" />

    <title>Yearbook Homepage</title>
</head>

<body>
    <header>
        <div class="logo" style="font-weight: 800">
            BCIT Digital Yearbook
        </div>
        <nav class="menu">
            <ul>
                <li><a class="menuItem" href="#">Home</a></li>
                <li>
                    <a class="menuItem" href="./gallery.php">Gallaries</a>
                </li>
            </ul>
            <div class="contact-btn">
                <a href="#">Contact</a>
            </div>
        </nav>
        <button class="hamburger">
            <i class="menuIcon"><ion-icon name="menu-outline" size="large"></ion-icon></i>
            <i class="closeIcon"><ion-icon name="close-outline" size="large"></ion-icon></i>
        </button>
    </header>

    <main>
        <div class="container">
            <h1>Welcome Graduates!</h1>
            <div class="description">
                <p>
                    Browse through the digital yearbook of your graduating
                    class!
                </p>
                <button id="login">
                    <a href="login.php">Log into your yearbook</a>
                </button>
            </div>
        </div>
        <div class="graphics">
            <img src="./uploaded_files/<?php echo $images[0][0] ?>" />
            <img src="./uploaded_files/<?php echo $images[1][0]?>" />
        </div>
    </main>

    <script src="hamburger.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>