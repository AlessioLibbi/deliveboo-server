import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import { forEach } from "lodash";
import { Logger } from "sass";
import.meta.glob(["../img/**"]);
const message = document.getElementById("message");
const deleteBtns = document.querySelectorAll(".btn-delete");
const checkboxes = Array.from(document.querySelectorAll('input[type="checkbox"]'));
const checkboxesChecked = Array.from(document.querySelectorAll('input[type="checkbox"][checked]'));
const submit = document.getElementById('submit');
const password = document.querySelectorAll('.password');

if(submit){
  submit.addEventListener('click', event => {
    const message = document.querySelector('.message');
    let messagePassword = [];
    if(document.querySelectorAll('.min')){
      let inputMin = document.querySelectorAll('.min');
      let messageMin = document.querySelectorAll('.message-min');
      for (let index = 0; index < inputMin.length; index++) {
        if(inputMin[index].value.length < 3){
          event.preventDefault();
          messageMin[index].classList.remove('d-none');
        } else {
          messageMin[index].classList.add('d-none');
        }
      }
      if(document.querySelector('.PIVA')){
        
        let messagePIVA = document.querySelector('.message-PIVA')
        let inputPIVA = document.querySelector('.PIVA');
        if(inputPIVA.value.length !== 11){
          event.preventDefault();
          messagePIVA.classList.remove('d-none')
        } else{
          messagePIVA.classList.add('d-none')
        }
      }
    }
    if(document.querySelector('.messagePassword')){
      messagePassword = document.querySelector('.messagePassword');
      messagePassword.classList.add('d-none');
      message.classList.add('d-none');
      console.log(checkboxesChecked.length);
      if(checkboxesChecked.length == 0){
        event.preventDefault();
        message.classList.remove('d-none');
      }  if (password[0].value !== password[1].value){
        event.preventDefault();
        messagePassword.classList.remove('d-none');
      } 
    }
    if(document.getElementById('price')){
      let priceMessage = document.querySelector('.price-message');
      console.log(priceMessage);
      let priceInput = document.getElementById('price');
      if(priceInput.value.length < 1){
        event.preventDefault();
        priceMessage.classList.remove('d-none');
      } else {
        priceMessage.classList.add('d-none');
      }
      
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
}

  



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
  if(message){

    setTimeout(() => {
      message.classList.add("display-none");
    }, 2000);
  }
}



eliminaErrore();
