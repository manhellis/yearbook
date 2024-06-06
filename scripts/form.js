// form.js

let currentStep = 1;
const form = document.getElementById("multiStepForm");
const steps = form.querySelectorAll(".step");
const img = document.querySelector("img");
const formHeader = document.querySelector(".step.active h2");

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
    // Add validation logic here if needed
    return true;
}

form.addEventListener("submit", function (event) {
    event.preventDefault();
    saveStepData(currentStep);
    // Submit formData to the server using AJAX or other methods
    console.log(formData);
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
