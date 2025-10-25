import "./bootstrap";

// Toggle password visibility
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".togglePassword").forEach((icon) => {
        icon.addEventListener("click", () => {
            const input = icon.previousElementSibling;
            if (!input) return;

            const type = input.type === "password" ? "text" : "password";
            input.type = type;

            // toggle ikon
            icon.classList.toggle("bi-eye");
            icon.classList.toggle("bi-eye-slash");
        });
    });
});

// Sidebar collapse state persistence
document.addEventListener("alpine:init", () => {
    Alpine.data("sidebar", () => ({
        collapsed: false,

        init() {
            // Load state dari localStorage
            this.collapsed =
                localStorage.getItem("sidebarCollapsed") === "true";

            // Watch perubahan collapsed
            this.$watch("collapsed", (value) => {
                localStorage.setItem("sidebarCollapsed", value);
            });
        },
    }));
});
