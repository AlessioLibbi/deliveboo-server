import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);
const message = document.getElementById("message");

function eliminaErrore() {
    setTimeout(() => {
        message.classList.add("display-none");
    }, 2000);
}

eliminaErrore();
