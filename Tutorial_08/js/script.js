const getModalBox = document.querySelectorAll(".modal-box");
const getDeleteBtn = document.querySelectorAll(".modal-delete-btn");
const getCancelBtn = document.querySelectorAll(".cancel-btn");

getDeleteBtn.forEach((val,index) => {
  val.addEventListener("click", function () {
    showModal(index);
  });
});

getCancelBtn.forEach((val, index) => {
  val.addEventListener("click", function () {
    hideModal(index);
  });
});

function showModal(index) {
  getModalBox[index].style.display = "block";
}

function hideModal(index) {
  getModalBox[index].style.display = "none";
}

