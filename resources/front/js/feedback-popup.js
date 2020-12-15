// 'brand'
import delegate from "delegate";
import PopUp from "./popup";
const popup = new PopUp();

delegate(
  ".brand",
  "click",
  function(e) {
    e.preventDefault();
    console.log(e.delegateTarget);
    popup.open("Хуй вам");
  },
  false
);
