import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import { forEach } from "lodash";
import.meta.glob(["../img/**"]);
const message = document.getElementById("message");
const deleteBtns = document.querySelectorAll(".btn-delete");
const checkboxes = Array.from(document.querySelectorAll('input[type="checkbox"]'));
const checkboxesChecked = Array.from(document.querySelectorAll('input[type="checkbox"][checked]'));
const submit = document.getElementById('submit');
const password = document.querySelectorAll('.password');


submit.addEventListener('click', event => {
    const message = document.querySelector('.message');
    const messagePassword = [];
    if(document.querySelector('.messagePassword')){
        messagePassword = document.querySelector('.messagePassword');
        messagePassword.classList.add('d-none');
    }
    message.classList.add('d-none');
    if(checkboxesChecked.length == 0){
        event.preventDefault();
        message.classList.remove('d-none');
    }  if (password[0].value !== password[1].value){
        event.preventDefault();
        messagePassword.classList.remove('d-none');
    } 
})

checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('click', function() {
    if (checkbox.checked) {
      checkboxesChecked.push(checkbox);
    } else {
      if (checkboxesChecked.includes(checkbox)) {
        const searchElement = checkboxesChecked.indexOf(checkbox);
        checkboxesChecked.splice(searchElement, 1);
      }
    }
  });
});
  



if (deleteBtns.length > 0) {
    deleteBtns.forEach((btn) => {
        btn.addEventListener("click", function(event) {
            event.preventDefault();
            const productName = btn.getAttribute("data-product-name");
            const deleteModal = new bootstrap.Modal(document.getElementById("delete-modal"));
            document.getElementById("product-name").innerText = productName;
            document.getElementById("action-delete").addEventListener("click", function() {
                btn.parentElement.submit();
            });
            deleteModal.show();
        });
    });
}
function eliminaErrore() {
    setTimeout(() => {
        message.classList.add("display-none");
    }, 2000);
}



eliminaErrore();
