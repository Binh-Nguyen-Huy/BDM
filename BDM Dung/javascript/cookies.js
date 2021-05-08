const cookies_container = document.querySelector(".cookies-container");
const cookies_btn = document.querySelector(".btn-cookies");

cookies_btn.addEventListener("click", () => {
    cookies_container.classList.remove("active");
    localStorage.setItem("cookiesBannerDisplay", "true")
});



setTimeout(() => {
    if(!localStorage.getItem("cookiesBannerDisplay"))
    cookies_container.classList.add("active");
}, 200); 