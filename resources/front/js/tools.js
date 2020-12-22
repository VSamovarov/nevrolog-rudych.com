//Функция для добавления прослушивателя событий к объекту или элементу
//http://qaru.site/questions/16064/javascript-window-resize-event

module.exports.addEvent = function (object, type, callback) {
    if (object == null || typeof (object) == 'undefined') return;
    if (object.addEventListener) {
        object.addEventListener(type, callback, false);
    } else if (object.attachEvent) {
        object.attachEvent("on" + type, callback);
    } else {
        object["on" + type] = callback;
    }
};

module.exports.togleClass = function (element, className) {
    if (element.classList) {
        element.classList.toggle(className);
    } else {
        // For IE9
        var classes = element.className.split(" ");
        var i = classes.indexOf(className);

        if (i >= 0)
            classes.splice(i, 1);
        else
            classes.push(className);
        element.className = classes.join(" ");
    }
};

//Удалить класс
module.exports.removeClass = function (element, nameClass) {
    let re = new RegExp("\\b" + nameClass + "\\b", "g");
    element.className = element.className.replace(re, "");
};

//Запустим функцию если клик вне объекта
//tools.actionClickOutside(document.querySelector('.top-menu'), () => closeMenu(), menuButton);
module.exports.actionClickOutside = function (object, callback, excludeObject = null) {
    /**
     * object - елемент, который отслеживаем
     * callback - функция, которую запускаем
     * excludeObject - если клик на этом объекте, то не выполняем callback
     */
    if (object == null || typeof (object) == 'undefined') return;
    let ua = navigator.userAgent,
        event = (ua.match(/iPad/i) || ua.match(/iPhone/)) ? "touchstart" : "click";
    document.addEventListener(event, (e) => {
        let target = e.target;
        if (excludeObject != null && typeof (excludeObject) != 'undefined' && (excludeObject.contains(target) || target == excludeObject)) return;
        if (!object.contains(target) && target != object) {
            callback();
        }
    });
};


module.exports.addEventToScrolling = function (callback, delay) {
    if (!callback || typeof callback !== 'function') return;

    let isScrolling;
    document.addEventListener(
        "scroll",
        () => {
            // Clear our timeout throughout the scroll
            window.clearTimeout(isScrolling);

            // Set a timeout to run after scrolling ends
            isScrolling = setTimeout(function () {
                callback();
            }, delay || 66);
        }, false
    );
}
