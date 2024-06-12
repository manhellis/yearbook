<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QA Yearbook Login</title>
    <link rel="stylesheet" href="./styles/login.css">
    <link rel="stylesheet" href="./scripts/loading-bar.min.css">
    <script type="text/javascript" src="./scripts/loading-bar.min.js"></script>
    <script src="https://kit.fontawesome.com/e416cc9f05.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/form.css">
</head>

<body>
    <header>
        <div class="logo" style="font-weight: 800">
            BCIT Digital Yearbook
        </div>
        <nav class="menu">
            <ul>
                <li><a class="menuItem" href="./index.html">Home</a></li>
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

        <div class="container">
            <h1>Welcome to your Yearbook </h1>
            <div class="form-fields">
                <form id='loginForm' method="post">
                    <label for="email">Whats your student email?</label>
                    <input type="text" name="email" id="email" placeholder="BCIT email" required>

                    <label for="password">
                        <p>Create a password</p>
                        <div class="eye"><ion-icon id="eye" name="eye-off-outline"></ion-icon><span>Hide</span></div>
                    </label>

                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>


                    <!-- go to onboarding -->
                    <button type="submit" id="create">Create Account</button>
                    <div class="checkbox">
                        <input type="checkbox" name="#" id="check" required>
                        <label>By contributing you agree to the <span class="tos">Terms of use</span> and <span class="tos">Privacy Policy</span></label>
                    </div>

                </form>
                <div id="errorMessage" style="color: red; display: none;"></div>

            </div>

            <div class="returning">
                <span class="left"></span>
                <span class="right"></span>
                <p>Returning User?</p>
                <!-- go to updating user -->
                <!-- <a href="./form.php" id="sign-in">Create Account!</a> -->
                <button id="sign-in">Login</button>
            </div>

        </div>
        <div class="create-container" style="display:none">
            <form id="multiStepForm">
                <div class="progress-bar">
                    <div class="progress" style="width: 20%"></div>
                </div>

                <!-- Step 1 content -->
                <div class="step active" data-step="1">
                    <h2>Create a Profile</h2>
                    <label for="name">Full Name</label>
                    <input id="name" type="text" name="step1Field1" required>
                    <label for="email-1">School Email</label>
                    <input id="email-1" type="text" name="step1Field2" required>
                    <button type="button" onclick="nextStep(1)">Next</button>
                </div>
                <!-- Step 2 content -->
                <div class="step" data-step="2">
                    <button class="previous" type="button" onclick="previousStep(2)"><i class="fa-solid fa-arrow-left fa-2xl"></i></button>

                    <h2>Tell us about you!</h2>
                    <label for="term">What term are you in?</label>
                    <input id="term" type="number" min='1' max='10' name="step2Field1">
                    <label for="subject">What has been your favourite subject?</label>
                    <input id="subject" type="text" name="step2Field2">
                    <button type="button" onclick="nextStep(2)">Next</button>
                </div>
                <!-- Step 3 content -->
                <div class="step" data-step="3">
                    <button class="previous" type="button" onclick="previousStep(3)"><i class="fa-solid fa-arrow-left fa-2xl"></i></button>

                    <h2>A few more details</h2>
                    <label for="memory">Favourite Memory?</label>
                    <input id="memory" type="text" name="step3Field1">
                    <label for="postgrad">Plans after graduation?</label>
                    <textarea id="postgrad" name="step3Field2"></textarea>
                    <button type="button" onclick="nextStep(3)">Next</button>
                </div>
                <!-- Step 4 content -->
                <div class="step" data-step="4">
                    <button class="previous" type="button" onclick="previousStep(4)"><i class="fa-solid fa-arrow-left fa-2xl"></i></button>

                    <h2>Almost there!</h2>
                    <label for="quote">Add a yearbook Quote?</label>
                    <input id="quote" type="text" name="step4Field1">
                    <label for="portfolio">Portfolio Link</label>
                    <input id="portfolio" type="text" name="step4Field2">
                    <button type="button" onclick="nextStep(4)">Next</button>
                </div>
                <!-- Step 5 content -->
                <div class="step" data-step="5">
                    <button class="previous" type="button" onclick="previousStep(5)"><i class="fa-solid fa-arrow-left fa-2xl"></i></button>

                    <h2>Profile Photo</h2>
                    <label for="photo">Select File</label>
                    <span class="imgDesc">Image will be uploaded to your profile</span>
                    <div id="drop-zone" class="drop-zone">
                        <i class="fa-regular fa-images fa-xl"></i>
                        <p class="imgDesc"><span class="chooseFile">Choose file </span>or drop here</p>
                        <input id="photo" type="file" name="step5Field1" class="file-input">
                    </div>
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
        <img src="./img/manh_ellis.jpeg" alt="BCIT Logo" class="form-img" style="display:none">


    </main>

    <script src="login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        let isLogin = false;

        document.querySelector('#sign-in').addEventListener('click', () => {
            isLogin = !isLogin;
            // console.log(isLogin);
            switchLogin();
        });
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            if (isLogin) {
                // Handle login
                handleLogin();
            } else {
                // Handle create account
                handleCreateAccount();
            }
        });

        const handleLogin = async () => {
            const email = document.getElementById('email')?.value;
            const password = document.getElementById('password')?.value;

            try {
                const response = await fetch('authenticate.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        email,
                        password
                    }),
                });

                const result = await response.json();

                if (result.status === 'success') {
                    window.location.href = `student_page.php?id=${encodeURIComponent(result.id)}`;
                } else {
                    const errorMessage = document.getElementById('errorMessage');
                    if (errorMessage) {
                        errorMessage.style.display = 'block';
                        errorMessage.innerText = result.response;
                    }
                }
            } catch (error) {
                console.error('Error:', error);
            }
        };

        const handleCreateAccount = () => {
            const email = document.getElementById('email').value;
            console.log(email);
            const password = document.getElementById('password').value;
            document.querySelector(".container").style.display = 'none';
            document.querySelector(".create-container").style.display = 'flex';
            document.querySelector('.form-img').style.display = 'block';
            document.querySelector('main').style.backgroundImage = 'none';
            document.querySelector('main').style.flexDirection = 'row';
            document.querySelector('#email-1').value = email;

        };



        const switchLogin = () => {
            if (isLogin) {
                document.getElementById('create').innerText = 'Login';
                document.getElementById('sign-in').innerText = 'Create Account';
                document.querySelector('.checkbox').style.display = 'none';
                document.querySelector('.checkbox').innerHTML = '';

            } else {
                document.getElementById('create').innerText = 'Create Account';
                document.getElementById('sign-in').innerText = 'Login';
                document.querySelector('.checkbox').style.display = 'flex';
                document.querySelector('.checkbox').innerHTML = `
                    <input type="checkbox" name="#" id="check" required>
                    <label>By continuing you agree to the Terms of use and Privacy Policy</label>
                `;
                document.getElementById('errorMessage').style.display = 'none';




            }
        }
    </script>
    <script src="./scripts/form.js"></script>
</body>

</html>