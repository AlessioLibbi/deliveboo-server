import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

const message = document.getElementById("message");
const deleteBtns = document.querySelectorAll(".btn-delete");
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
