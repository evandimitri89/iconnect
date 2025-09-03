import "./bootstrap";

// Toggle password visibility
const toggle = document.getElementById("togglePassword");
const password = document.getElementById("password");

toggle.addEventListener("click", () => {
    const type =
        password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    toggle.classList.toggle("bi-eye");
    toggle.classList.toggle("bi-eye-slash");
});
