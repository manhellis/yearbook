// form.js

let currentStep = 1;
const form = document.getElementById("multiStepForm");
const steps = form.querySelectorAll(".step");
const img = document.querySelector("img");
const formHeader = document.querySelector(".step.active h2");
const email = document.querySelector("#email-1");
const formData = {};
const progressBar = document.querySelector(".progress-bar");
const progressIndicator = document.querySelector(".progress");
// Function to navigate to the next step
function nextStep(step) {
    if (validateStep(step)) {
        saveStepData(step);
        showStep(step + 1);
    }
}

// Function to navigate to the previous step
function previousStep(step) {
    showStep(step - 1);
}

// Function to show a specific step
function showStep(step) {
    steps.forEach((stepElement, index) => {
        stepElement.classList.toggle("active", index === step - 1);
    });
    currentStep = step;

    img.style.display = step !== 1 ? "none" : "";
    formHeader.style.marginBottom = step !== 1 ? "2em" : "1em";
    progressBar.style.transform = step !== 1 ? "translateY(160px)" : "";
    loadStepData(step);

    // const progressWidth = (step / steps.length) * 100;
    // progressElements.forEach((progress) => {
    //     progress.style.width = `${progressWidth}%`;
    // });
    const stepSegmentWidth = 100 / steps.length; // Assuming steps.length is 5
    const newLeft = (step - 1) * stepSegmentWidth;
    progressIndicator.style.left = `${newLeft}%`;
}

// Function to save the data of the current step
function saveStepData(step) {
    const stepData = {};
    steps[step - 1].querySelectorAll("input").forEach((input) => {
        stepData[input.name] = input.value;
    });
    formData[`step${step}`] = stepData;
}

// Function to load the data of the current step
function loadStepData(step) {
    const stepData = formData[`step${step}`];
    if (stepData) {
        steps[step - 1].querySelectorAll("input").forEach((input) => {
            input.value = stepData[input.name] || "";
        });
    }
}

// Function to validate the data of the current step
function validateStep(step) {
    if (step === 1) {
        const emailValue = email.value;
        const requiredDomain = ["@my.bcit.ca", "@bcit.ca"];
        const isValidDomain = requiredDomain.some((domain) =>
            emailValue.endsWith(domain)
        );
        if (!isValidDomain) {
            alert(`Please enter a valid BCIT email address`);
            return false;
        } else {
            console.log("valid");
        }
        if (document.querySelector("#name").value === "") {
            alert("Please enter your name");
            return false;
        }
    }

    const requiredInputs = ["email"];

    return true;
}

form.addEventListener("submit", function (event) {
    event.preventDefault();
    saveStepData(currentStep);
    const fullName = formData.step1.step1Field1.split(" ");
    // const password = document.getElementById('password').value; // so secure right ?!
    // Prepare the form data
    const formDataObject = {
        firstname: fullName[0],
        lastname: fullName[1],
        email: formData.step1.step1Field2,
        term: formData.step2.step2Field1,
        subject: formData.step2.step2Field2,
        memory: formData.step3.step3Field1,
        postgrad: formData.step3.step3Field2,
        quote: formData.step4.step4Field1,
        portfolio: formData.step4.step4Field2,
        password: password,
    };

    const submitData = new FormData();
    for (const key in formDataObject) {
        submitData.append(key, formDataObject[key]);
    }

    // Add the file to the form data
    const fileInput = document.getElementById("photo");
    if (fileInput.files.length > 0) {
        submitData.append("photo", fileInput.files[0]);
    }

    // Add a field to indicate the save action
    submitData.append("save", true);

    // Send the AJAX request
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./create_user.php", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            // Handle successful response
            alert("Form submitted successfully");
            location.href = "./gallery.php"; 
            console.log("Form submitted successfully:", xhr.responseText);
        } else {
            // Handle error
            alert("Error submitting form");
            console.error("Error submitting form:", xhr.statusText);
        }
    };

    xhr.onerror = function () {
        // Handle network error
        console.error("Network error occurred.");
    };

    xhr.send(submitData);
});

document.addEventListener("DOMContentLoaded", () => {
    const dropZone = document.getElementById("drop-zone");
    const fileInput = document.getElementById("photo");

    dropZone.addEventListener("click", () => {
        fileInput.click();
    });

    dropZone.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZone.classList.add("dragover");
    });

    dropZone.addEventListener("dragleave", () => {
        dropZone.classList.remove("dragover");
    });

    dropZone.addEventListener("drop", (e) => {
        e.preventDefault();
        dropZone.classList.remove("dragover");

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
        }
    });

    fileInput.addEventListener("change", () => {
        if (fileInput.files.length > 0) {
            dropZone.querySelector(
                "p"
            ).textContent = `File selected: ${fileInput.files[0].name}`;
        }
    });
});
