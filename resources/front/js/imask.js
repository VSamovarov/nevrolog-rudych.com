import IMask from "imask";
import delegate from "delegate";

var maskOptions = {
  mask: "+38(000)000-00-00"
};

// //Делегирование
// tools.addEvent(wrapper, "input[type=tel]", 'focusin' , () => {
//   const target = event.target || event.srcElement;

//   if (target.type == "tel" || target.name == "tel") {
//     IMask(target, maskOptions);
//   }
// });

delegate(document.body, "input[type=tel]", "focusin", e =>
  IMask(e.target, maskOptions)
);
