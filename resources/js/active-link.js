const links = document.getElementsByClassName("link");

for (let index = 0; index < links.length; index++) {
    const element = links[index];
    element.addEventListener("click", () => {
        for (let i = 0; i < links.length; i++) {
            links[i].classList.remove('active');
        }
        element.classList.add("active");
    });
}
