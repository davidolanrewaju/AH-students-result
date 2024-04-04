const menuBtn = document.getElementsByClassName("menu-btn")[0];
const sideBar = document.getElementsByClassName("sidebar")[0];

menuBtn.addEventListener('click', () => {
    if (sideBar.style.display === 'none') {
        sideBar.style.display = 'block';
    } else {
        sideBar.style.display = 'none';
    }
})

console.log(menuBtn, sideBar);
