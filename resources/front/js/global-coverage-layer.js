const zIndex = 10000; // параметр стиля z-index

export default class GlobalCoverLayer {
  constructor() {
    if (GlobalCoverLayer._instance) {
      return GlobalCoverLayer._instance;
    }
    GlobalCoverLayer._instance = this;

    if (this._layer == undefined) this._layer = this._createGlobalLayer();
  }

  _createGlobalLayer() {
    let div = document.createElement("div");

    div.setAttribute(
      "style",
      `position:fixed; width: 100%; height: 100%; background: transparent; display: none; z-index:${zIndex}`
    );

    /**
     * По клику создаю событие, чтобы легко было идентифицировать клик
     * Потом на него будем вешать другие события
     */
    div.onclick = function() {
      let event = new Event("GlobalCoverLayerClick", { bubbles: true });
      div.dispatchEvent(event);
    };

    document.body.prepend(div);
    return div;
  }
  show(backgroundColor = "transparent", opacity = 0) {
    Object.assign(this._layer.style, {
      display: "block",
      background: backgroundColor,
      opacity: opacity
    });
  }
  hide() {
    Object.assign(this._layer.style, {
      display: "none",
      background: "transparent",
      opacity: "0"
    });
  }
  get layer() {
    return this._layer;
  }
  get isActive() {
    return this._layer.style.display === block;
  }
}
