<?php
include_once 'crud.php';

// Get the student ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $mySQLiconn->prepare("SELECT * FROM new_students WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        echo "No student found.";
        exit;
    }
} else {
    echo "No student ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo htmlspecialchars($row['fn']) . ' ' . htmlspecialchars($row['ln']); ?>'s Details</title>
    <script src="hamburger.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/profile.css">
</head>

<body>
    <header>
        <div class="logo" style="font-weight: 800">
            BCIT Digital Yearbook
        </div>
        <nav class="menu">
            <ul>
                <li><a class="menuItem" href="./index.php">Home</a></li>
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
        <!-- <?php
        print_r($row);
        ?> -->
        <div class="title">
            <?php echo '<h1>' . ucfirst(htmlspecialchars($row['fn'])) . ' ' . ucfirst(htmlspecialchars($row['ln'])) . "</h1>"; ?>
            <?php echo '<p>' . "Term " . htmlspecialchars($row['term']) . '</p>'; ?>
        </div>
        <div class="main-container">

            <img src="<?php 
            if ($row['photo'] == '') {
                echo './img/Default_pfp.svg';
            } else {
                echo './uploaded_files/' . htmlspecialchars($row['photo']); 
            }
            ?>" class="profile" alt="Student Photo">

            <div class="description">
                <p>Grad Year 2024</p>
                <ul>
                    <li><b>Favourite Subject:</b> <?php echo htmlspecialchars($row['subject']); ?></li>

                    <li><b>Favourite Memories:</b> <?php echo htmlspecialchars($row['memory']); ?></li>
                    <li><b>Post-Grad Plans:</b> <?php echo htmlspecialchars($row['postgrad']); ?></li>
                    <li><b>Yearbook Qoutes:</b> <?php echo htmlspecialchars($row['quote']); ?></li>
                </ul>
                <button id="portfolio">Portfolio</button>
            </div>
        </div>
    </main>
</body>

</html>