<?php
include_once 'crud.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Yearbook Entries</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .view-switch .btn.active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="browse.php">Browse</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="view-switch">
            <button class="btn btn-default active" id="cards-view-btn">Cards View</button>
            <button class="btn btn-default" id="table-view-btn">Table View</button>
        </div>

        <!-- Cards View -->
        <div id="cards-view">
            <div class="row">
                <?php
                $res = $mySQLiconn->query("SELECT * FROM students ORDER BY ln, fn ASC");
                while ($row = $res->fetch_assoc()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="thumbnail" onclick="location.href=\'student_page.php?id='.htmlspecialchars($row['id']).'\'" style="cursor:pointer;">';
                    if ($row['photo'] == "") {
                        echo '<img src="./img/Default_pfp.svg" alt="Default Image" style="width:100%; height:auto;">';
                    }else if (!is_null($row['photo'])) {
                        echo '<img src="./uploaded_files/'.htmlspecialchars($row['photo']).'" alt="Student Photo" style="width:100%; height:auto;">';
                    } 
                    echo '<div class="caption">';
                    echo '<h3>'.htmlspecialchars($row['fn']).' '.htmlspecialchars($row['ln']).'</h3>';
                    echo '<p><strong>Job:</strong> '.htmlspecialchars($row['job']).'</p>';
                    echo '<p><strong>Bio:</strong> '.htmlspecialchars($row['words']).'</p>';
                    echo '</div>'; // end caption
                    echo '</div>'; // end thumbnail
                    echo '</div>'; // end col-md-4
                }
                ?>
            </div>
        </div>

        <!-- Table View (Initially hidden) -->
        <div id="table-view" style="display:none;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Job</th>
                        <th>Bio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $res->data_seek(0); // Reset the pointer to the beginning
                    while ($row = $res->fetch_assoc()) {
                        echo '<tr onclick="location.href=\'student_page.php?id='.htmlspecialchars($row['id']).'\'" style="cursor:pointer;">';
                        echo '<td>';
                        if ($row['photo'] == ""){
                            echo '<img src="./img/Default_pfp.svg" style="width:50px; height:auto;">';
                        }
                        else if (!is_null($row['photo'])) {
                            echo '<img src="./uploaded_files/'.htmlspecialchars($row['photo']).'" style="width:50px; height:auto;">';
                        } 
                        echo '</td>';
                        echo '<td>'.htmlspecialchars($row['fn']).'</td>';
                        echo '<td>'.htmlspecialchars($row['ln']).'</td>';
                        echo '<td>'.htmlspecialchars($row['job']).'</td>';
                        echo '<td>'.htmlspecialchars($row['words']).'</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

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
</body>
</html>
