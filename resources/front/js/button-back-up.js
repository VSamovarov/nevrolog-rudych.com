const tools = require("./tools.js");

let container = document.querySelector("#app");
let button = document.createElement("a");
button.classList.add("button-back-up");
button.setAttribute("href", "#header");
//icon - right

container.appendChild(button);

tools.addEventToScrolling(() => {
  let scrollTop = window.pageYOffset
    ? window.pageYOffset
    : document.documentElement.scrollTop
    ? document.documentElement.scrollTop
    : document.body.scrollTop;

  if (scrollTop > 600 && !button.classList.contains("show")) {
    button.classList.add("show");
  } else if (scrollTop < 600 && button.classList.contains("show")) {
    tools.removeClass(button, "show");
  }
});
