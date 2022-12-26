const getModalBox = document.querySelectorAll(".delete-box");
const getDeleteBtn = document.querySelectorAll(".delete-btn");

getDeleteBtn.forEach((val, index) => {
    val.addEventListener("click", function() {
        showModal(index);
    });
});

function showModal(index) {
    getModalBox[index].style.display = "block";
}