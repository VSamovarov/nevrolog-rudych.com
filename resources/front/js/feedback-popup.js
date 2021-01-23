// 'brand'
import delegate from "delegate";
import PopUp from "./popup";
const popup = new PopUp();

delegate(
  ".call-me-back-form",
  "click",
  function(e) {
    e.preventDefault();
  },
  false
);
