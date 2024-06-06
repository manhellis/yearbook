<?php
include_once 'db.php';
session_start();
if (!isset($_POST['email'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    exit('Please fill both the email and password fields!');
}
if ($stmt = $mySQLiconn->prepare('SELECT id, password FROM students_login WHERE email = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['id'] = $id;
            echo json_encode(['status' => 'success', 'id' => $id]);

            // $stmt->close();
            // header('Location: student_page.php?id='.$id);
            exit();
            // echo 'Welcome back, ' . htmlspecialchars($_SESSION['name'], ENT_QUOTES) . '!';
        } else {
            // Incorrect password
            echo json_encode(['status' => 'fail', 'response' => 'Incorrect username and/or password!']);
        }
    } else {
        // Incorrect username
        echo json_encode(['status' => 'fail', 'response' => 'Incorrect username and/or password!']);
    }

    $stmt->close();
}
