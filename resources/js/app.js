import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;

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

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const avatarWrapper = document.getElementById("avatarWrapper");
    const fileInput = document.getElementById("profilePhotoInput");
    const preview = document.getElementById("avatarPreview");

    avatarWrapper.addEventListener("click", () => fileInput.click());

    fileInput.addEventListener("change", () => {
        const file = fileInput.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = (e) => {
            if (preview.tagName === "IMG") {
                preview.src = e.target.result;
            } else {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.className = "w-24 h-24 rounded-full object-cover shadow";
                preview.replaceWith(img);
            }
        };
        reader.readAsDataURL(file);
    });
});
