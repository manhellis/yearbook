<?php

include_once 'db.php';
// Function to delete the photo file from the server
function deletePhotoFile($id)
{
    global $mySQLiconn;
    $stmt = $mySQLiconn->prepare("SELECT photo FROM students_login WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if ($row['photo'] && file_exists('./uploaded_files/' . $row['photo'])) {
            unlink('./uploaded_files/' . $row['photo']); // Delete the file
        }
    }
    $stmt->close();
}
if (isset($_POST['save'])) {
    $fn = $mySQLiconn->real_escape_string($_POST['firstname']);
    $ln = $mySQLiconn->real_escape_string($_POST['lastname']);
    $job = $mySQLiconn->real_escape_string($_POST['job']);
    $words = $mySQLiconn->real_escape_string($_POST['words']);
    $inspire = $mySQLiconn->real_escape_string($_POST['inspire']);
    $dislike = $mySQLiconn->real_escape_string($_POST['dislike']);
    $password = $mySQLiconn->real_escape_string($_POST['password']);
    $email = $mySQLiconn->real_escape_string($_POST['email']);
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

    $sql = $mySQLiconn->query("INSERT INTO students_login (fn, ln, job, words, inspire, dislike, photo, password, email) VALUES ('$fn','$ln','$job','$words', '$inspire', '$dislike', '$photoName', '$password', '$email')");
    if (!$sql) {
        echo $mySQLiconn->error;
    }
}
if (isset($_GET['del'])) {
    $id = $mySQLiconn->real_escape_string($_GET['del']);

    // Delete photo file if it exists
    deletePhotoFile($id);

    // Delete record from the database using a prepared statement
    $stmt = $mySQLiconn->prepare("DELETE FROM students_login WHERE id = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    if (!$result) {
        echo $mySQLiconn->error;
    } else {
        header("Location: index.php");
        exit();
    }
    $stmt->close();
}

if (isset($_GET['edit'])) {
    $sql = $mySQLiconn->query("SELECT * FROM students_login WHERE id=" . $_GET['edit']);
    if (!$sql) {
        echo $mySQLiconn->error;
    }
    $getROW = $sql->fetch_array();
}


if (isset($_POST['update'])) {
    $id = $mySQLiconn->real_escape_string($_GET['edit']);
    $fn = $mySQLiconn->real_escape_string($_POST['firstname']);
    $ln = $mySQLiconn->real_escape_string($_POST['lastname']);
    $job = $mySQLiconn->real_escape_string($_POST['job']);
    $words = $mySQLiconn->real_escape_string($_POST['words']);
    $inspire = $mySQLiconn->real_escape_string($_POST['inspire']);
    $dislike = $mySQLiconn->real_escape_string($_POST['dislike']);

    // Assume photo might be updated
    $photoName = null;

    // Check if a new file has been uploaded
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        // Call function to delete old photo file
        deletePhotoFile($id);

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
            die('Error moving the file.');
        }
    }

    // Update record, including new photo if uploaded
    if ($photoName) {
        $stmt = $mySQLiconn->prepare("UPDATE students_login SET fn = ?, ln = ?, job = ?, words = ?, inspire = ?, dislike = ?, photo = ? WHERE id = ?");
        $stmt->bind_param("sssssssi", $fn, $ln, $job, $words, $inspire, $dislike, $photoName, $id);
    } else {
        // If no new photo, don't update the photo column
        $stmt = $mySQLiconn->prepare("UPDATE students_login  SET fn = ?, ln = ?, job = ?, words = ?, inspire = ?, dislike = ? WHERE id = ?");
        $stmt->bind_param("ssssssi", $fn, $ln, $job, $words, $inspire, $dislike, $id);
    }

    $result = $stmt->execute();
    if (!$result) {
        echo $mySQLiconn->error;
    } else {
        header("Location: index.php");
        exit();
    }
    $stmt->close();
}
