let popup = document.getElementById("popup");
let checkboxBtn = document.getElementById("MyCheckbox");
function PopupAppear() {
    if (checkboxBtn.checked == true) {
        popup.classList.add("open-popup");
    } else {
        popup.classList.remove("open-popup");
    }
}

function PopupClose() {
    // Temporary-will figure this out soon
    popup.classList.remove("open-popup");
}