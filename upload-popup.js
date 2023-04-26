function PopUp() {
    var popup = document.getElementById("popup-upload");
    popup.classList.toggle('active');

    var blur = document.getElementById("grid-all-contents");
    blur.classList.toggle('blur');
}


const uploadBtn = document.getElementById("upload-btn");
uploadBtn.addEventListener("click", PopUp);

const cancelBtn = document.getElementById("cancel-btn");
cancelBtn.addEventListener('click', PopUp)

