<?php
session_start();
// Debugging
error_log("Session ID: " . session_id());
error_log("Session variables: " . print_r($_SESSION, true));
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect to login.php if not logged in
    exit();
}
include_once 'crud.php';
$fn = ''; // Initialize variables to hold field values
$ln = '';
$words = '';
$job = '';
$inspire = '';
$dislike = '';
$photo = '';
$row = null;
$password = '';
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $res = $mySQLiconn->query("SELECT * FROM students WHERE id=$id");
    if ($row = $res->fetch_array()) {
        $fn = $row['fn']; // Assign fetched values to variables
        $ln = $row['ln'];
        $words = $row['words'];
        $job = $row['job'];
        $inspire = $row['inspire'];
        $dislike = $row['dislike'];
        $photo = $row['photo'];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="./styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="browse.php">Browse</a></li>
                    <li><button type="button" class="btn btn-warning"><a href="logout.php">Logout</a></button></li>

                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="edit-header">
            <h3 class="userID <?php echo isset($_GET['edit']) ? "visible" : "hidden"; ?>">
                Editing userId:
                <?php echo $_GET['edit']; ?>
            </h3>
            <?php if (isset($_GET['edit'])) { // Only show images if editing 
            ?>
                <?php if (!empty($row['photo']) && file_exists("./uploaded_files/" . $row['photo'])) { ?>
                    <img src="./uploaded_files/<?php echo htmlspecialchars($row['photo']); ?>" alt="photo" class="img-thumbnail" style="width: 400px; height: 400px;">
                <?php } else { ?>
                    <img src="./img/Default_pfp.svg" alt="Default Photo">
                <?php } ?>
            <?php } ?>
        </div>

        <form class="form-signin" method="POST" enctype="multipart/form-data">

            <!-- removed from original, as this is related to registration -->
            <!--
            <?php if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
            <?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

 -->
            <h2 class="form-signin-heading">Create A Yearbook Entry</h2>
            <div class="form-group">
                <input type="text" name="firstname" class="form-control" id='firstname' placeholder="First Name" value="<?php echo htmlspecialchars($fn); ?>" required>
                <input type="text" name="lastname" class="form-control" id='lastname' placeholder="Last Name" value="<?php echo htmlspecialchars($ln); ?>" required>
                <input type='email' name='email' class='form-control' placeholder="Email" required>
                <input type='password' name='password' class='form-control' placeholder="Password" required>
                <input type="text" id="job" name="job" class='form-control' placeholder="Job" value="<?php echo htmlspecialchars($job); ?>" required>


                <textarea class="form-control" name="words" placeholder="Bio" rows="5" value="" required><?php echo htmlspecialchars($words); ?></textarea>
                <textarea class="form-control" name="inspire" placeholder="What Inspires you?" rows="5" value="" required><?php echo htmlspecialchars($inspire); ?></textarea>
                <textarea class="form-control" name="dislike" placeholder="What do you dislike" rows="2" value="" required><?php echo htmlspecialchars($dislike); ?></textarea>

                <input class="form-control" placeholder="Photo Upload" name='photo' type="file">
                <p class="help-block">Image Must be 480 x 640</p>
                <?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
                <?php if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
                <!-- <label for="inputEmail" class="sr-only">Email address</label> -->
                <!-- <label for="inputPassword" class="sr-only">Password</label> -->
                <?php if (isset($_GET['edit'])) : ?>
                    <button class="btn btn-lg btn-primary btn-block" name='update' type="update">Update My Page</button>
                    <!-- Display this button when editing -->
                <?php else : ?>
                    <!-- Display this button for new entries -->
                    <!-- <input type="submit" name="save" value="Save"> -->

                    <!-- <input type="submit" name="save" value="Save"> -->
                    <button class="btn btn-lg btn-success btn-block" name='save' type="save">Register</button>
                    <!-- <a class="btn btn-lg btn-success btn-block" href="register.php">Register for Yearbook</a> -->
                <?php endif; ?>
            </div>
        </form>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                    <th>Job</th>
                    <th>Words</th>
                    <th>Inspire</th>
                    <th>Dislike</th>
                    <th >Photo</th>
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                $res = $mySQLiconn->query("SELECT * FROM students_login");
                while ($row = $res->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fn']; ?></td>
                        <td><?php echo $row['ln']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['job']; ?></td>
                        <td><?php echo $row['words']; ?></td>
                        <td><?php echo $row['inspire']; ?></td>
                        <td><?php echo $row['dislike']; ?></td>
                        <td>
                            <?php if ($row['photo'] == "") { ?>
                                <span>no photo</span>
                            <?php } else { ?>
                                <img src="./uploaded_files/<?php echo htmlspecialchars($row['photo']); ?>" alt="photo" class="img-thumbnail" style="width: 100px; height: 100px;">
                            <?php } ?>
                        </td>
                        <td>
                            <a href="?del=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


</body>
<script>
    new Cropper
</script>

</html>