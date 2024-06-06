<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QA Yearbook Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/gallery.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <div class="logo">
            <h2>BCIT Digital Yearbook</h2>
        </div>
        <nav>
            <ul>
                <li><a href="./index.html">Home</a></li>
                <li><a href="./gallery.php">Galleries</a></li>
                <li><a href="#">Staff & Faculties</a></li>
                <li><a href="#" style="color: white;"><button id="contact">Contact</a></button></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="description">
                <h1>The Gallery</h1>
                <h3>BCIT Yearbook</h3>
                <p>Search for yourself, friends or family through our digital gallery!</p>
                <a href="login.html" id="login">Log into your yearbook</a>
            </div>
        </div>
        <div class="gallery">
            <div class="tabs">
                <button class="tablinks" onclick="openTab(event, 'all')">All</button>
                <button class="tablinks" onclick="openTab(event, 'graduates')">Graduates</button>
                <button class="tablinks" onclick="openTab(event, 'staff')">Staff</button>
            </div>
            <div class="content">
                <div class="search">
                    <input type="text" id="search" placeholder="Search for names..">
                </div>
                <div id="cards-view">
                    <div class="row">
                        <?php
                        include_once 'crud.php';
                        session_start();
                        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
                            header("Location: login.php"); // Redirect to login.php if not logged in
                            exit();
                        }
                        $res = $mySQLiconn->query("SELECT * FROM students_login ORDER BY ln, fn ASC");
                        while ($row = $res->fetch_assoc()) {
                            echo '<div class="col-md-4">';
                            echo '<div class="thumbnail" onclick="location.href=\'student_page.php?id=' . htmlspecialchars($row['id']) . '\'" style="cursor:pointer;">';
                            if ($row['photo'] == "") {
                                echo '<img src="default.jpg" alt="Default Image" style="width:100%">';
                            } else {
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['photo']) . '" alt="Student Image" style="width:100%">';
                            }
                            echo '<div class="caption">';
                            echo '<h3>' . htmlspecialchars($row['fn']) . ' ' . htmlspecialchars($row['ln']) . '</h3>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- <div id="table-view" style="display: none;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $res = $mySQLiconn->query("SELECT * FROM students_login ORDER BY ln, fn ASC");
                        while ($row = $res->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['fn']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['ln']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div> -->
            <script>
                document.getElementById('cards-view-btn').addEventListener('click', function() {
                    document.getElementById('cards-view').style.display = 'block';
                    document.getElementById('table-view').style.display = 'none';
                    this.classList.add('active');
                    document.getElementById('table-view-btn').classList.remove('active');
                });

                document.getElementById('table-view-btn').addEventListener('click', function() {
                    document.getElementById('cards-view').style.display = 'none';
                    document.getElementById('table-view').style.display = 'block';
                    this.classList.add('active');
                    document.getElementById('cards-view-btn').classList.remove('active');
                });
            </script>
        </div>
    </main>
</body>

</html>