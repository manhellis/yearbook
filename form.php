<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QA Yearbook Login</title>
    <link rel="stylesheet" href="./scripts/loading-bar.min.css">
    <script type="text/javascript" src="./scripts/loading-bar.min.js"></script>
    <script src="https://kit.fontawesome.com/e416cc9f05.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./styles/form.css">
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
        <div class="container">
            <form id="multiStepForm">
                <div class="progress-bar">
                    <div class="progress" style="width: 20%"></div>
                </div>

                <!-- Step 1 content -->
                <div class="step active" data-step="1">
                    <h2>Create a Profile</h2>
                    <label for="name">Full Name</label>
                    <input id="name" type="text" name="step1Field1">
                    <label for="email">School Email</label>
                    <input id="email" type="text" name="step1Field2">
                    <button type="button" onclick="nextStep(1)">Next</button>
                </div>
                <!-- Step 2 content -->
                <div class="step" data-step="2">
                    <button class="previous" type="button" onclick="previousStep(2)"><i class="fa-solid fa-arrow-left fa-2xl"></i></button>

                    <h2>Tell us about you!</h2>
                    <label for="term">What term are you in?</label>
                    <input id="term" type="text" name="step2Field1">
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
        <img src="./img/manh_ellis.jpeg" alt="BCIT Logo" class="logo">

    </main>
    <script src="./scripts/form.js"></script>
</body>