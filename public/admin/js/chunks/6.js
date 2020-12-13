(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[6],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _mixin__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./../mixin */ "./resources/admin/js/Components/Content/MetaData/mixin.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
var titleModuleDefaul = "Текст";

/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_mixin__WEBPACK_IMPORTED_MODULE_0__["default"]],
  props: {
    module: Object | null,
    locales: Object,
    title: {
      type: String,
      "default": titleModuleDefaul
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue?vue&type=template&id=35fd9482&":
/*!******************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue?vue&type=template&id=35fd9482& ***!
  \******************************************************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    { class: this.module._name },
    [
      _vm.title
        ? _c("p", { staticClass: "text-black-50 small" }, [
            _vm._v(_vm._s(_vm.title))
          ])
        : _vm._e(),
      _vm._v(" "),
      _c(
        "b-tabs",
        { attrs: { small: "" } },
        _vm._l(_vm.locales, function(values, lang) {
          return _c(
            "b-tab",
            { key: lang, attrs: { title: lang } },
            [
              _c(
                "b-form-group",
                [
                  _c("b-form-textarea", {
                    attrs: {
                      value: _vm.getValue([lang]),
                      rows: "3",
                      "max-rows": "6",
                      trim: ""
                    },
                    on: {
                      input: function($event) {
                        return _vm.changeModule(lang, $event)
                      }
                    }
                  })
                ],
                1
              )
            ],
            1
          )
        }),
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue":
/*!*****************************************************************************************!*\
  !*** ./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue ***!
  \*****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _MultilingualTextarea_vue_vue_type_template_id_35fd9482___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./MultilingualTextarea.vue?vue&type=template&id=35fd9482& */ "./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue?vue&type=template&id=35fd9482&");
/* harmony import */ var _MultilingualTextarea_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./MultilingualTextarea.vue?vue&type=script&lang=js& */ "./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _MultilingualTextarea_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _MultilingualTextarea_vue_vue_type_template_id_35fd9482___WEBPACK_IMPORTED_MODULE_0__["render"],
  _MultilingualTextarea_vue_vue_type_template_id_35fd9482___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************!*\
  !*** ./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_MultilingualTextarea_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../../node_modules/vue-loader/lib??vue-loader-options!./MultilingualTextarea.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_MultilingualTextarea_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue?vue&type=template&id=35fd9482&":
/*!************************************************************************************************************************!*\
  !*** ./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue?vue&type=template&id=35fd9482& ***!
  \************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MultilingualTextarea_vue_vue_type_template_id_35fd9482___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../node_modules/vue-loader/lib??vue-loader-options!./MultilingualTextarea.vue?vue&type=template&id=35fd9482& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/admin/js/Components/Content/MetaData/Modules/MultilingualTextarea.vue?vue&type=template&id=35fd9482&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MultilingualTextarea_vue_vue_type_template_id_35fd9482___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MultilingualTextarea_vue_vue_type_template_id_35fd9482___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);