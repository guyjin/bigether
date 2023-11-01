document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector("main");
    container.classList.add("random");

    // Listen to menu link clicks
    document.querySelectorAll("nav a").forEach((link) => {
        link.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default browser behavior

            const href = this.getAttribute("href");
            const targetCell = document.querySelector(
                `.card[name=${href.slice(1)}]`
            );
            const rect = targetCell.getBoundingClientRect();

            const translateX =
                -targetCell.offsetLeft + window.innerWidth / 2 - rect.width / 2;
            const translateY =
                -targetCell.offsetTop +
                window.innerHeight / 2 -
                rect.height / 2;

            // Use GSAP to animate
            gsap.to(container, {
                duration: 0.75,
                x: translateX,
                y: translateY,
                ease: Sine.easeOut,
            });
        });
    });
});
