(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/admin/js/Components/Modules/ModulesLoader.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/admin/js/Components/Modules/ModulesLoader.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      module: null,
      moduleName: "Default"
    };
  },
  computed: {
    loader: function loader() {
      var _this = this;

      if (!this.moduleName) {
        return null;
      }

      return function () {
        return !(function webpackMissingModule() { var e = new Error("Cannot find module 'undefined'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
      };
    }
  },
  mounted: function mounted() {
    var _this2 = this;

    this.loader().then(function () {
      _this2.module = function () {
        return {
          // Загружаемый компонент. Значение должно быть Promise
          component: _this2.loader(),
          // Компонент загрузки, используемый пока загружается асинхронный компонент
          // loading: LoadingComponent,
          // Компонент ошибки, используемый при неудачной загрузке
          // error: ErrorComponent,
          // Задержка перед показом компонента загрузки. По умолчанию: 200 мс.
          delay: 200,
          // Компонент ошибки будет отображаться, если таймаут
          // был указан и время ожидания превышено. По умолчанию: Infinity.
          timeout: 3000
        };
      };
    })["catch"](function () {
      _this2.module = function () {
        return Promise.resolve().then(function webpackMissingModule() { var e = new Error("Cannot find module './../Components/Modules/Default'"); e.code = 'MODULE_NOT_FOUND'; throw e; });
      };
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/admin/js/Components/Modules/ModulesLoader.vue?vue&type=template&id=1a1538d7&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/admin/js/Components/Modules/ModulesLoader.vue?vue&type=template&id=1a1538d7& ***!
  \******************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(_vm.module, { tag: "component" })
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/admin/js/Components/Modules/ModulesLoader.vue":
/*!*****************************************************************!*\
  !*** ./resources/admin/js/Components/Modules/ModulesLoader.vue ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ModulesLoader_vue_vue_type_template_id_1a1538d7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ModulesLoader.vue?vue&type=template&id=1a1538d7& */ "./resources/admin/js/Components/Modules/ModulesLoader.vue?vue&type=template&id=1a1538d7&");
/* harmony import */ var _ModulesLoader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ModulesLoader.vue?vue&type=script&lang=js& */ "./resources/admin/js/Components/Modules/ModulesLoader.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ModulesLoader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ModulesLoader_vue_vue_type_template_id_1a1538d7___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ModulesLoader_vue_vue_type_template_id_1a1538d7___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/admin/js/Components/Modules/ModulesLoader.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/admin/js/Components/Modules/ModulesLoader.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/admin/js/Components/Modules/ModulesLoader.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesLoader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ModulesLoader.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/admin/js/Components/Modules/ModulesLoader.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesLoader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/admin/js/Components/Modules/ModulesLoader.vue?vue&type=template&id=1a1538d7&":
/*!************************************************************************************************!*\
  !*** ./resources/admin/js/Components/Modules/ModulesLoader.vue?vue&type=template&id=1a1538d7& ***!
  \************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesLoader_vue_vue_type_template_id_1a1538d7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ModulesLoader.vue?vue&type=template&id=1a1538d7& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/admin/js/Components/Modules/ModulesLoader.vue?vue&type=template&id=1a1538d7&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesLoader_vue_vue_type_template_id_1a1538d7___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesLoader_vue_vue_type_template_id_1a1538d7___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);