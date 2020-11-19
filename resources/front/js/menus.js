// import { on } from "delegated-events";
import delegate from "delegate";
import GlobalCoverageLayer from "./global-coverage-layer";
const coverageLayer = new GlobalCoverageLayer();
const zIndexCoverageLayer = coverageLayer.layer.style.zIndex;
const menuWrapper = document.querySelector("#header");
let activeElements = [];

delegate(
  menuWrapper,
  ".main-navbar__has-submenu",
  "click",
  function(e) {
    if (e.target.classList.contains("rd-dropdown-link")) return;
    e.preventDefault();
    const element = e.target.closest(".main-navbar__has-submenu");
    if (element.classList.contains("active")) {
      element.classList.remove("active");
      activeElements = activeElements.filter(item => item !== element);
    } else {
      element.classList.add("active");
      activeElements.map(item => {
        if (
          !item.classList.contains("hamburger") &&
          !item.classList.contains("header__menu")
        ) {
          item.classList.remove("active");
        }
      });
      activeElements = activeElements.filter(
        item => !item.classList.contains("main-navbar__has-submenu")
      );
      activeElements.push(element);
    }
    coverageLayerToggle();
    return;
  },
  false
);

buttonMenu(menuWrapper, "button.hamburger", ".header__menu");
buttonMenu(menuWrapper, ".dots-menu-button", ".contacts-wrapper");

function buttonMenu(menuWrapper, actionElementSelector, openElementSelector) {
  delegate(
    menuWrapper,
    actionElementSelector,
    "click",
    function(e) {
      e.preventDefault();
      const element = e.target.closest(actionElementSelector);
      const openElement = menuWrapper.querySelector(openElementSelector);
      if (element.classList.contains("active")) {
        element.classList.remove("active");
        openElement.classList.remove("active");
        activeElements = [];
      } else {
        element.classList.add("active");
        openElement.classList.add("active");
        activeElements.map(item => item.classList.remove("active"));
        activeElements = [element, openElement];
      }

      coverageLayerToggle();
      return;
    },
    false
  );
}

function coverageLayerToggle() {
  if (activeElements.length > 0) {
    coverageLayer.show();
    menuWrapper.style.zIndex =
      Number(menuWrapper.style.zIndex) + Number(zIndexCoverageLayer);
  } else {
    menuWrapper.style.zIndex =
      Number(menuWrapper.style.zIndex) - Number(zIndexCoverageLayer);
    coverageLayer.hide();
  }
}
delegate("body", "GlobalCoverLayerClick", () => {
  activeElements.map(item => item.classList.remove("active"));
  activeElements = [];
  coverageLayerToggle();
});
