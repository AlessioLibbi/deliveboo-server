import "./bootstrap";
import "./myPie.js"
import './mychart.js';
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import { forEach } from "lodash";
import { Logger } from "sass";
import.meta.glob(["../img/**"]);
const timer = document.getElementById("timer");
const deleteBtns = document.querySelectorAll(".btn-delete");
const checkboxes = Array.from(document.querySelectorAll('input[type="checkbox"]'));
const checkboxesChecked = Array.from(document.querySelectorAll('input[type="checkbox"][checked]'));
const submit = document.getElementById('submit');
const password = document.querySelectorAll('.password');


if (document.getElementById('mypsw')) {
  const myInput = document.getElementById("mypsw");
  const letter = document.getElementById("myletter");
  const capital = document.getElementById("mycapital");
  const number = document.getElementById("mynumber");
  const length = document.getElementById("mylength");
  const pswbox = document.getElementById('validatePassword');
  myInput.onfocus = function () {
    pswbox.classList.remove('d-none');
  };
  myInput.onblur = function () {
    pswbox.classList.add('d-none');
  };

  myInput.onkeyup = function () {
    const lowerCaseLetters = /[a-z]/g;
    if (lowerCaseLetters.test(myInput.value)) {
      letter.classList.add('d-none');
    } else {
      letter.classList.remove('d-none');
    }
    const upperCaseLetters = /[A-Z]/g;
    if (upperCaseLetters.test(myInput.value)) {
      capital.classList.add('d-none');
    } else {
      capital.classList.remove('d-none');
    }
    const numbers = /[0-9]/g;
    if (numbers.test(myInput.value)) {
      number.classList.add('d-none');
    } else {
      number.classList.remove('d-none');
    }
    if (myInput.value.length >= 8) {
      length.classList.add('d-none');
    } else {
      length.classList.remove('d-none');
    }
  }
};


if (submit) {
  submit.addEventListener('click', event => {
    const message = document.querySelector('.message');
    let messagePassword = [];
    if (document.querySelectorAll('.min')) {
      let inputMin = document.querySelectorAll('.min');
      let messageMin = document.querySelectorAll('.message-min');
      for (let index = 0; index < inputMin.length; index++) {
        if (inputMin[index].value.length < 3) {
          event.preventDefault();
          messageMin[index].classList.remove('d-none');
        } else {
          messageMin[index].classList.add('d-none');
        }
      }
      if (document.querySelector('.PIVA')) {

        let messagePIVA = document.querySelector('.message-PIVA')
        let inputPIVA = document.querySelector('.PIVA');
        if (inputPIVA.value.length !== 11) {
          event.preventDefault();
          messagePIVA.classList.remove('d-none')
        } else {
          messagePIVA.classList.add('d-none')
        }
      }
    };
    if (document.querySelector('.messagePassword')) {
      messagePassword = document.querySelector('.messagePassword');
      messagePassword.classList.add('d-none');
      message.classList.add('d-none');
      if (checkboxesChecked.length == 0) {
        event.preventDefault();
        message.classList.remove('d-none');
      } if (password[0].value !== password[1].value) {
        event.preventDefault();
        messagePassword.classList.remove('d-none');
      }
    }
    if (document.getElementById('price')) {
      let priceMessage = document.querySelector('.price-message');
      let priceInput = document.getElementById('price');
      if (priceInput.value < 0) {
        event.preventDefault();
        priceMessage.classList.remove('d-none');
      } else {
        priceMessage.classList.add('d-none');
      }
    }
    if (document.getElementById('inputNumber')) {
      const inputNumber = document.getElementById('inputNumber');
      const messageNumber = document.getElementById('messageNumber');
      const phoneno = /\b[\+]?[(]?[0-9]{2,6}[)]?[-\s\.]?[-\s\/\.0-9]{3,15}\b/m;
      if (phoneno.test(inputNumber.value)) {
        messageNumber.classList.add('d-none');
      } else {
        event.preventDefault();
        messageNumber.classList.remove('d-none');
      }
    }
    if (document.getElementById('inputEmail')) {
      const inputEmail = document.getElementById('inputEmail');
      const messageEmail = document.getElementById('messageEmail');
      const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (mailformat.test(inputEmail.value)) {
        messageEmail.classList.add('d-none');
      } else {
        event.preventDefault();
        messageEmail.classList.remove('d-none');
      }
    }
  })

  checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('click', function () {
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
    btn.addEventListener("click", function (event) {
      event.preventDefault();
      const productName = btn.getAttribute("data-product-name");
      const deleteModal = new bootstrap.Modal(document.getElementById("delete-modal"));
      document.getElementById("product-name").innerText = productName;
      document.getElementById("action-delete").addEventListener("click", function () {
        btn.parentElement.submit();
      });
      deleteModal.show();
    });
  });
}
function eliminaErrore() {
  if (timer) {

    setTimeout(() => {
      timer.classList.add("d-none");
    }, 2000);
  }
}



eliminaErrore();
