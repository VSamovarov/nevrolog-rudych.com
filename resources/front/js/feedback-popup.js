import delegate from "delegate";
import PopUp from "./popup";
const popup = new PopUp();

delegate(
  "*[data-call-form]",
  "click",
  function(e) {
    e.preventDefault();
    const formName = e.target.dataset.callForm;
    const callMyBackForm = document.querySelector(`form[data-form-name="${formName}"]`);
    popup.open(callMyBackForm.cloneNode(true))
  },
  false
);
