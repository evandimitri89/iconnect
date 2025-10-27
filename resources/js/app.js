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

Alpine.data("profile", () => ({
    editing: false,
    previewUrl: null,

    form: {
        name: user.name,
        nis: user.nis,
        nisn: user.nisn,
        gender: user.gender,
        birth_place: user.birth_place,
        birth_date: user.birth_date,
        address: user.address,
        phone: user.phone,
        email: user.email,
        religion: user.religion,
    },

    startEdit() {
        this.editing = true;
        this.original = JSON.parse(JSON.stringify(this.form));
    },

    cancelEdit() {
        this.form = JSON.parse(JSON.stringify(this.original));
        this.previewUrl = null;
        this.editing = false;
    },

    triggerFile() {
        this.$refs.file.click();
    },

    fileChosen(e) {
        const file = e.target.files[0];
        if (file) {
            this.previewUrl = URL.createObjectURL(file);
        }
    },
}));

Alpine.start();
