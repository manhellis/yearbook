const password = document.querySelector("#password");
const hidetxt = document.querySelector(".eye span");
const eye = document.querySelector("#eye");
const togglePassword = () => {
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    hidetxt.textContent = type === "password" ? "Show" : "Hide";
};

eye.addEventListener("click", togglePassword);
hidetxt.addEventListener("click", togglePassword);