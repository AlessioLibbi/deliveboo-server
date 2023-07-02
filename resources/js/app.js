import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);
const Error = document.getElementById("alert");

function eliminaErrore() {
    setTimeout(() => {
        Error.classList.add("display-none");
    }, 2000);
}

eliminaErrore();
