import './bootstrap';


const option_svg = document.querySelectorAll(".option_svg");
const option_menu = document.querySelectorAll(".option_menu");
const btn_delete_menu = document.querySelectorAll(".btn_delete_menu");
const delete_modal = document.querySelectorAll(".delete-modal");
const overlay_delete  = document.querySelector(".overlay_delete ");

option_svg.forEach((option, index) => {
    option.addEventListener("click", (event) => {
        event.preventDefault();
        option_menu[index].classList.toggle('active_option');
    })
})

btn_delete_menu.forEach((btn, index) => {
   btn.addEventListener("click", (event) => {
    event.preventDefault();
    delete_modal[index].classList.add('active');
    overlay_delete.classList.add('active');
   })
})
