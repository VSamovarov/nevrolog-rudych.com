window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.withCredentials = true;
window.csrfToken = document.querySelector('meta[name="csrf-token"]').content;

require("./menus");
require("./gallery");
require("./forms");
// require("./popup.js");
// require("./feedback-popup.js");

// require("./global-coverage-layer");

// import GlobalCoverageLayer from "./global-coverage-layer";

console.log("Привет!");
