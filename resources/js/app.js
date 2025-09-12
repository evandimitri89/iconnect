import "./bootstrap";

// Toggle password visibility
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".togglePassword").forEach((icon) => {
        icon.addEventListener("click", () => {
            const input = icon.previousElementSibling; // ambil input sebelum icon
            if (!input) return;

            const type = input.type === "password" ? "text" : "password";
            input.type = type;

            // toggle ikon
            icon.classList.toggle("bi-eye");
            icon.classList.toggle("bi-eye-slash");
        });
    });
});
