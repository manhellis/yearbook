<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QA Yearbook Login</title>
    <link rel="stylesheet" href="./styles/login.css">
</head>

<body>
    <header>
        <div class="logo">
            <h2>BCIT Digital Yearbook</h2>
        </div>
        <nav>
            <ul>
                <li><a href="./index.html">Home</a></li>
                <li><a href="./gallery.php">Gallaries</a></li>
                <li><a href="#" style="color: white;"><button id="contact">Contact</a></button></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Welcome to your Yearbook </h1>
        <div class="container">
            <div class="form-fields">
                <form action="authenticate.php" method="post">
                    <label for="email">Whats your student email?</label>
                    <input type="text" name="email" id="email" placeholder="BCIT email">

                    <label for="password">
                        <p>Create a password</p>
                        <div class="eye"><ion-icon id="eye" name="eye-off-outline"></ion-icon><span>Hide</span></div>
                    </label>

                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">


                    <!-- go to onboarding -->
                    <button type="submit" id="create">Create Account</button>
                    <div class="checkbox">
                        <input type="checkbox" name="#" id="check">
                        <label>By contrinuing you agree to the Terms of use and Privacy Policy</label>
                    </div>

                </form>
            </div>

            <div class="returning">
                <span class="left"></span>
                <span class="right"></span>
                <p>Returning User? </p>
                <!-- go to updating user -->
                <button id="sign-in">Login Here!</button>
            </div>

        </div>


    </main>

    <script src="login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>