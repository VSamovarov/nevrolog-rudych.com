/**
 * import PopUp from "./popup";
 * const popup = new PopUp();
 *
 *
 *
 */
import delegate from "delegate";
const bodyScrollLock = require("body-scroll-lock");

export default class PopUp {
  constructor() {
    if (PopUp._instance) {
      return PopUp._instance;
    }
    PopUp._instance = this;

    if (this._popup == undefined) this._popup = this._createPopUp();
  }
  _createPopUp() {
    const popUpHtml = document.createElement("div");
    popUpHtml.id = "pop-up-modal";
    popUpHtml.className = "hystmodal";
    //aria-hidden="false"
    popUpHtml.ariaHidden = "false";
    //hystmodal--active
    popUpHtml.innerHTML = `
      <div class="hystmodal__wrap">
        <div class="hystmodal__window" role="dialog" aria-modal="true">
          <button class="hystmodal__close" data-hystclose="">&times;</button>
          <div class="hystmodal__content">
          </div>
        </div>
      </div>
      `;
    // popUpHtml.querySelector(".hystmodal__close").addEventListener('click', this.close.bind(this));
    delegate(
      "#pop-up-modal",
      "click",
      (function(e) {
        e.preventDefault();
        if(
          e.target.classList.contains('hystmodal__close') ||
          e.target.classList.contains('hystmodal__wrap')
        ) {
          this.close()
        }
      }).bind(this),
      false
    );

    document.body.prepend(popUpHtml);
    return popUpHtml;
  }
  open(content) {
    bodyScrollLock.disableBodyScroll(document.body);
    bodyScrollLock.enableBodyScroll(this._popup);
    this._popup.classList.add("hystmodal--active");
    this.putContent(content)
  }
  close() {
    this._popup.classList.remove("hystmodal--active");
    bodyScrollLock.clearAllBodyScrollLocks();
  }

  putContent(content) {
    this.clearContent();
    const wrapper = this._popup.querySelector(".hystmodal__content");
    wrapper.append(content)
  }

  clearContent() {
    this._popup.querySelector(".hystmodal__content").innerHTML = '';
  }
}
