<?php
include_once 'crud.php';

// Get the student ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $mySQLiconn->prepare("SELECT * FROM students WHERE id = ?");
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
    <title><?php echo htmlspecialchars($row['fn']).' '.htmlspecialchars($row['ln']); ?>'s Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Yearbook</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="browse.php">Browse</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container student-details">
        <div class="row">
            <div class="col-md-4">
                <?php if (!is_null($row['photo'])): ?>
                    <img src="./uploaded_files/<?php echo htmlspecialchars($row['photo']); ?>" class="img-responsive img-thumbnail" alt="Student Photo">
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <h1><?php echo htmlspecialchars($row['fn']).' '.htmlspecialchars($row['ln']); ?></h1>
                <p><strong>Job:</strong> <?php echo htmlspecialchars($row['job']); ?></p>
                <p><strong>Bio:</strong> <?php echo htmlspecialchars($row['words']); ?></p>
                <p><strong>Inspires:</strong> <?php echo htmlspecialchars($row['inspire']); ?></p>
                <p><strong>Dislikes:</strong> <?php echo htmlspecialchars($row['dislike']); ?></p>
            </div>
        </div>
        <a href="browse.php" class="btn btn-primary my-2">Back to Browse</a>
    </div>
</body>
</html>
