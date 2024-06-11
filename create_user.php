<?php
include_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $fn = $mySQLiconn->real_escape_string($_POST['firstname']);
    $ln = $mySQLiconn->real_escape_string($_POST['lastname']);
    $email = $mySQLiconn->real_escape_string($_POST['email']);
    $term = $mySQLiconn->real_escape_string($_POST['term']);
    $subject = $mySQLiconn->real_escape_string($_POST['subject']);
    $memory = $mySQLiconn->real_escape_string($_POST['memory']);
    $postgrad = $mySQLiconn->real_escape_string($_POST['postgrad']);
    $quote = $mySQLiconn->real_escape_string($_POST['quote']);
    $portfolio = $mySQLiconn->real_escape_string($_POST['portfolio']);
    $password = $mySQLiconn->real_escape_string($_POST['password']);
    $photoName = null;

    // Check if a file has been uploaded
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['photo']['tmp_name'];
        $fileName = $_FILES['photo']['name'];
        $fileSize = $_FILES['photo']['size'];
        $fileType = $_FILES['photo']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Clean the file name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Define where to save the file
        $uploadFileDir = './uploaded_files/';
        $dest_path = $uploadFileDir . $newFileName;

        // Check if the directory exists, if not create it
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0755, true);
        }

        // Move the file from the temporary directory to the target directory
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $photoName = $newFileName;
        } else {
            // Handle error if the upload failed
            die('Error moving the file.');
        }
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = $mySQLiconn->query("INSERT INTO new_students (fn, ln, email, term, subject, memory, postgrad, quote, portfolio, photo, password) VALUES ('$fn', '$ln', '$email', '$term', '$subject', '$memory', '$postgrad', '$quote', '$portfolio', '$photoName', '$password')");
    if (!$sql) {
        echo "Error: " . $mySQLiconn->error;
    } else {
        echo "Form data saved successfully.";
    }
} else {
    echo "Invalid request.";
}
?>
