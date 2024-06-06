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
                <form id='loginForm' method="post">
                    <label for="email">Whats your student email?</label>
                    <input type="text" name="email" id="email" placeholder="BCIT email">

                    <label for="password">
                        <p>Create a password</p>
                        <div class="eye"><ion-icon id="eye" name="eye-off-outline"></ion-icon><span>Hide</span></div>
                    </label>

                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">


                    <!-- go to onboarding -->
                    <button type="submit" id="create">Login</button>
                    <div class="checkbox">
                        <input type="checkbox" name="#" id="check" required>
                        <label>By contrinuing you agree to the Terms of use and Privacy Policy</label>
                    </div>

                </form>
                <div id="errorMessage" style="color: red; display: none;"></div>

            </div>

            <div class="returning">
                <span class="left"></span>
                <span class="right"></span>
                <p>New User?</p>
                <!-- go to updating user -->
                <a href="./form.php" id="sign-in">Create Account!</a>
            </div>

        </div>


    </main>

    <script src="login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'authenticate.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        window.location.href = 'student_page.php?id=' + encodeURIComponent(response.id);
                    } else {
                        document.getElementById('errorMessage').style.display = 'block';
                        document.getElementById('errorMessage').innerText = response;
                    }
                }
            };
            xhr.send('email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password));
        });
    </script>
</body>

</html>