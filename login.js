const password = document.querySelector("#password");
const eye = document.querySelector("#eye");
const togglePassword = () => {
    const type =
        password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
};

eye.addEventListener("click", togglePassword);