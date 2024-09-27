import "./bootstrap";
import "flowbite";

// Navbar Fixed
document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector("header");

    if (header) {
        const fixedNav = header.offsetTop;

        window.addEventListener("scroll", function () {
            if (window.pageYOffset > fixedNav) {
                header.classList.add("nav-fixed");
            } else {
                header.classList.remove("nav-fixed");
            }
        });
    }
});

// Scroll Animation
document.addEventListener("DOMContentLoaded", function () {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
            }
        });
    });

    const hiddenElements = document.querySelectorAll(".none");
    hiddenElements.forEach((el) => observer.observe(el));
});
