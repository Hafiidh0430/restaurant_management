import "./bootstrap";

const option_svg = document.querySelectorAll(".option_svg");
const option_menu = document.querySelectorAll(".option_menu");
const btn_delete_menu = document.querySelectorAll(".btn_delete_menu");
const delete_modal = document.querySelectorAll(".delete-modal");
const keep_modal = document.querySelectorAll(".keep-modal");
const overlay_delete = document.querySelector(".overlay_delete ");

const option_order_svg = document.querySelectorAll(".option_order_svg");
const option_order_menu = document.querySelectorAll(".option_order_menu");
const btn_delete_order_menu = document.querySelectorAll(".btn_delete_order_menu");
const delete_order_modal = document.querySelectorAll(".delete-order-modal");
const keep_order_modal = document.querySelectorAll(".keep-order-modal");
const overlay_order_delete = document.querySelector(".overlay_order_delete ");

option_svg.forEach((option, index) => {
    option.addEventListener("click", (event) => {
        event.preventDefault();
        option_menu[index].classList.toggle("active_option");
    });
});

btn_delete_menu.forEach((btn, index) => {
    btn.addEventListener("click", (event) => {
        event.preventDefault();
        delete_modal[index].classList.add("active");
        overlay_delete.classList.add("active");
    });

    keep_modal.forEach((keep) => {
        keep.addEventListener("click", (event) => {
            event.preventDefault();
            delete_modal[index].classList.remove("active");
            overlay_delete.classList.remove("active");
            option_menu[index].classList.remove("active_option");
        });
    });
});

option_order_svg.forEach((option, index) => {
    option.addEventListener("click", (event) => {
        event.preventDefault();
        option_order_menu[index].classList.toggle("active_order_option");
    });
});

btn_delete_order_menu.forEach((btn, index) => {
    btn.addEventListener("click", (event) => {
        event.preventDefault();
        delete_order_modal[index].classList.add("active");
        overlay_order_delete.classList.add("active");
    });

    keep_order_modal.forEach((keep) => {
        keep.addEventListener("click", (event) => {
            event.preventDefault();
            delete_order_modal[index].classList.remove("active");
            overlay_order_delete.classList.remove("active");
            option_order_menu[index].classList.remove("active_order_option");
        });
    });
});
