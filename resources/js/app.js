import "./bootstrap";

document.addEventListener("alpine:init", () => {
    const notification = document.querySelector("div.notify");

    if (notification) {
        setTimeout(() => {
            notification.remove();
        }, notify.timeout);
    }
});

NProgress.configure({
    showSpinner: true,
    easing: "ease",
    speed: 500,
});

// Event listener untuk memulai NProgress saat halaman dimuat
document.addEventListener("DOMContentLoaded", function () {
    NProgress.start();
});

// Event listener untuk memulai NProgress sebelum halaman berpindah
window.addEventListener("beforeunload", function () {
    NProgress.start();
});

window.addEventListener("load", function () {
    NProgress.done();
});
