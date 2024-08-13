import './bootstrap';


const option_svg = document.querySelectorAll(".option_svg");
const option_menu = document.querySelectorAll(".option_menu");

option_svg.forEach((option, index) => {
    option.addEventListener("click", (event) => {
        event.preventDefault();
        option_menu[index].classList.toggle('active_option');
    })
})

