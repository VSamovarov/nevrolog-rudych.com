const classPreloader = "preloader-block";
export default class Preloader {
  constructor(content) {
    this._content = content;
    this._oldPositionType = this._content.style.position;
    if (this._oldPositionType === "static") {
      this._content.style.position = "relative";
    }
    this._content.append(this._createPreloader());
  }
  _createPreloader() {
    if (!this._preloader) {
      this._preloader = document.createElement("div");
      this._preloader.innerHTML = "<div></div>";
      this._preloader.className = classPreloader;
    }

    return this._preloader;
  }
  remove() {
    if (this._preloader) {
      this._preloader.remove();
    }
    if (this._oldPositionType) {
      this._content.style.position = this._oldPositionType;
    }
  }
}
