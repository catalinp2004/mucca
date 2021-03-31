(self["webpackChunk"] = self["webpackChunk"] || []).push([["person"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Catalog/Product.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Catalog/Product.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "Product"
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Catalog/Products.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Catalog/Products.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
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
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "Products",
  data: function data() {
    return {
      request: {
        per_page: 12,
        search: null,
        category: null,
        subcategory: null,
        color: null,
        current_page: 1
      },
      products: null,
      nr_products: 1000000,
      show_filter: false,
      error: null
    };
  },
  created: function created() {
    if (this.$route.query.search != undefined) {
      this.request.search = this.$route.query.search;
    }

    if (this.$route.query.category != undefined) {
      this.request.category = this.$route.query.category;
    }

    if (this.$route.query.subcategory != undefined) {
      this.request.subcategory = this.$route.query.subcategory;
    }

    if (this.$route.query.color != undefined) {
      this.request.color = this.$route.query.color;
    }

    if (this.$route.query.current_page != undefined) {
      this.request.current_page = parseInt(this.$route.query.current_page);
    }

    this.showProducts();
  },
  methods: {
    showProducts: function showProducts() {
      var _this = this;

      var crt = JSON.parse(JSON.stringify(this.request.current_page));
      axios.post('/api/products', this.request).then(function (response) {
        _this.nr_products = response.data.nr_products;
        _this.products = response.data.products;
        console.log(_this.request.current_page);
      })["catch"](function (error) {});
      console.log(this.request.current_page);
    },
    changeUrl: function changeUrl() {
      this.showProducts();
      var query = {};

      if (this.request.search != null) {
        query.search = this.request.search;
      }

      if (this.request.category != null) {
        query.category = this.request.category;
      }

      if (this.request.subcategory != null) {
        query.subcategory = this.request.subcategory;
      }

      if (this.request.color != null) {
        query.color = this.request.color;
      }

      if (this.request.current_page != 1) {
        query.current_page = this.request.current_page;
      }

      this.$router.push({
        path: this.$route.path,
        query: query
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/NotFound.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/NotFound.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "NotFound"
});

/***/ }),

/***/ "./resources/js/views/Catalog/Product.vue":
/*!************************************************!*\
  !*** ./resources/js/views/Catalog/Product.vue ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Product_vue_vue_type_template_id_50dea0ec_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Product.vue?vue&type=template&id=50dea0ec&scoped=true& */ "./resources/js/views/Catalog/Product.vue?vue&type=template&id=50dea0ec&scoped=true&");
/* harmony import */ var _Product_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Product.vue?vue&type=script&lang=js& */ "./resources/js/views/Catalog/Product.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _Product_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Product_vue_vue_type_template_id_50dea0ec_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _Product_vue_vue_type_template_id_50dea0ec_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "50dea0ec",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Catalog/Product.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/views/Catalog/Products.vue":
/*!*************************************************!*\
  !*** ./resources/js/views/Catalog/Products.vue ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Products_vue_vue_type_template_id_1e30e2d9_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Products.vue?vue&type=template&id=1e30e2d9&scoped=true& */ "./resources/js/views/Catalog/Products.vue?vue&type=template&id=1e30e2d9&scoped=true&");
/* harmony import */ var _Products_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Products.vue?vue&type=script&lang=js& */ "./resources/js/views/Catalog/Products.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _Products_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Products_vue_vue_type_template_id_1e30e2d9_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _Products_vue_vue_type_template_id_1e30e2d9_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "1e30e2d9",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Catalog/Products.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/views/NotFound.vue":
/*!*****************************************!*\
  !*** ./resources/js/views/NotFound.vue ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _NotFound_vue_vue_type_template_id_5dcdfd0e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./NotFound.vue?vue&type=template&id=5dcdfd0e&scoped=true& */ "./resources/js/views/NotFound.vue?vue&type=template&id=5dcdfd0e&scoped=true&");
/* harmony import */ var _NotFound_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./NotFound.vue?vue&type=script&lang=js& */ "./resources/js/views/NotFound.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _NotFound_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _NotFound_vue_vue_type_template_id_5dcdfd0e_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _NotFound_vue_vue_type_template_id_5dcdfd0e_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "5dcdfd0e",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/NotFound.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/views/Catalog/Product.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/views/Catalog/Product.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Product_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Product.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Catalog/Product.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Product_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/views/Catalog/Products.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/views/Catalog/Products.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Products_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Products.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Catalog/Products.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Products_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/views/NotFound.vue?vue&type=script&lang=js&":
/*!******************************************************************!*\
  !*** ./resources/js/views/NotFound.vue?vue&type=script&lang=js& ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NotFound_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./NotFound.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/NotFound.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NotFound_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/views/Catalog/Product.vue?vue&type=template&id=50dea0ec&scoped=true&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/views/Catalog/Product.vue?vue&type=template&id=50dea0ec&scoped=true& ***!
  \*******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Product_vue_vue_type_template_id_50dea0ec_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Product_vue_vue_type_template_id_50dea0ec_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Product_vue_vue_type_template_id_50dea0ec_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Product.vue?vue&type=template&id=50dea0ec&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Catalog/Product.vue?vue&type=template&id=50dea0ec&scoped=true&");


/***/ }),

/***/ "./resources/js/views/Catalog/Products.vue?vue&type=template&id=1e30e2d9&scoped=true&":
/*!********************************************************************************************!*\
  !*** ./resources/js/views/Catalog/Products.vue?vue&type=template&id=1e30e2d9&scoped=true& ***!
  \********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Products_vue_vue_type_template_id_1e30e2d9_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Products_vue_vue_type_template_id_1e30e2d9_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Products_vue_vue_type_template_id_1e30e2d9_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Products.vue?vue&type=template&id=1e30e2d9&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Catalog/Products.vue?vue&type=template&id=1e30e2d9&scoped=true&");


/***/ }),

/***/ "./resources/js/views/NotFound.vue?vue&type=template&id=5dcdfd0e&scoped=true&":
/*!************************************************************************************!*\
  !*** ./resources/js/views/NotFound.vue?vue&type=template&id=5dcdfd0e&scoped=true& ***!
  \************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NotFound_vue_vue_type_template_id_5dcdfd0e_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NotFound_vue_vue_type_template_id_5dcdfd0e_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NotFound_vue_vue_type_template_id_5dcdfd0e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./NotFound.vue?vue&type=template&id=5dcdfd0e&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/NotFound.vue?vue&type=template&id=5dcdfd0e&scoped=true&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Catalog/Product.vue?vue&type=template&id=50dea0ec&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Catalog/Product.vue?vue&type=template&id=50dea0ec&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("p", [_vm._v("Product")])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Catalog/Products.vue?vue&type=template&id=1e30e2d9&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Catalog/Products.vue?vue&type=template&id=1e30e2d9&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "products-filter-wrapper" },
    [
      _c(
        "div",
        {
          staticClass:
            "filter-menu d-flex flex-column flex-md-row justify-content-between pl-lg-5 mb-4 mb-md-5"
        },
        [
          _vm._m(0),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "order-1 order-lg-2 d-flex d-lg-block mb-4 mb-md-0"
            },
            [
              _c("button", { staticClass: "btn btn-randomize mr-2 mr-md-4" }, [
                _vm._v("Randomize")
              ]),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass: "btn btn-search",
                  on: {
                    click: function($event) {
                      _vm.show_filter = !_vm.show_filter
                    }
                  }
                },
                [
                  _c("span", [_vm._v("Search / Filter")]),
                  _vm._v(" "),
                  _c("img", {
                    staticClass: "img-fluid",
                    attrs: {
                      src: "/img/stoggler_search.png",
                      srcset: "/img/toggler_search.svg" + " 1x"
                    }
                  })
                ]
              ),
              _vm._v(" "),
              _c(
                "div",
                {
                  class: { show: _vm.show_filter },
                  attrs: { id: "search-menu" }
                },
                [
                  _c(
                    "form",
                    {
                      staticClass: "form search-form catalog-form show",
                      attrs: { action: "", method: "POST" }
                    },
                    [
                      _c(
                        "button",
                        {
                          staticClass: "ml-auto",
                          attrs: { type: "button", id: "close-search-menu" },
                          on: {
                            click: function($event) {
                              _vm.show_filter = !_vm.show_filter
                            }
                          }
                        },
                        [
                          _c("img", {
                            staticClass: "img-fluid mb-5",
                            attrs: {
                              src: "/img/search_menu_close.png",
                              srcset: "/img/search_menu_close.svg" + " 1x"
                            }
                          })
                        ]
                      ),
                      _vm._v(" "),
                      _vm._m(1),
                      _vm._v(" "),
                      _vm._m(2),
                      _vm._v(" "),
                      _vm._m(3),
                      _vm._v(" "),
                      _vm._m(4),
                      _vm._v(" "),
                      _vm._m(5)
                    ]
                  )
                ]
              )
            ]
          )
        ]
      ),
      _vm._v(" "),
      _c("div", { staticClass: "products pl-lg-5" }, [
        _c(
          "div",
          { staticClass: "row" },
          _vm._l(_vm.products, function(product) {
            return _c(
              "div",
              { staticClass: "col-6 col-lg-3 product-case mb-4 mb-lg-0 mt-4" },
              [
                _c("img", {
                  staticClass: "img-fluid mb-3",
                  attrs: { src: "/storage/img/products" + product.filename }
                }),
                _vm._v(" "),
                _c("p", [_vm._v(_vm._s(product.name))]),
                _vm._v(" "),
                _c(
                  "router-link",
                  {
                    staticClass: "d-flex align-items-center",
                    attrs: { to: "/catalog/" + product.slug }
                  },
                  [
                    _c("img", {
                      staticClass: "img-fluid mr-3",
                      attrs: {
                        src: "/img/cross_product.png",
                        srcset: "/img/cross_product.svg" + " 1x"
                      }
                    }),
                    _vm._v(" "),
                    _c("p", { staticClass: "mb-0" }, [_vm._v("Vezi produs")])
                  ]
                )
              ],
              1
            )
          }),
          0
        )
      ]),
      _vm._v(" "),
      _c("b-pagination", {
        staticClass:
          " my-5 d-flex justify-content-center align-items-center py-5",
        attrs: {
          "total-rows": _vm.nr_products,
          "per-page": _vm.request.per_page,
          size: "lg"
        },
        on: { input: _vm.changeUrl },
        model: {
          value: _vm.request.current_page,
          callback: function($$v) {
            _vm.$set(_vm.request, "current_page", $$v)
          },
          expression: "request.current_page"
        }
      })
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "breadcrumbs order-2 order-lg-1" }, [
      _c("a", { attrs: { href: "#" } }, [_vm._v("Home / All /")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group input-group-catalog" }, [
      _c("input", {
        staticClass: "form-control",
        attrs: {
          type: "text",
          placeholder: "COD PRODUS / CUVÂNT",
          "aria-label": "Username",
          "aria-describedby": "search"
        }
      }),
      _vm._v(" "),
      _c("div", { staticClass: "input-group-prepend" }, [
        _c(
          "span",
          { staticClass: "input-group-text", attrs: { id: "search" } },
          [
            _c("img", {
              staticClass: "img-fluid",
              attrs: {
                src: "/img/icon_search.png",
                srcset: "/img/icon_search.svg" + " 1x",
                alt: "icon-search"
              }
            })
          ]
        ),
        _vm._v(" "),
        _c("span", { staticClass: "search-span", attrs: { for: "#search" } }, [
          _vm._v("Search")
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group input-group-catalog" }, [
      _c("span", { staticClass: "search-span" }, [_vm._v("Categorie")]),
      _vm._v(" "),
      _c(
        "select",
        { staticClass: "form-control", attrs: { id: "input-category" } },
        [_c("option", { attrs: { selected: "" } }, [_vm._v("All")])]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group input-group-catalog" }, [
      _c("span", { staticClass: "search-span" }, [_vm._v("Subcategorie")]),
      _vm._v(" "),
      _c(
        "select",
        { staticClass: "form-control", attrs: { id: "input-subcategory" } },
        [_c("option", { attrs: { selected: "" } }, [_vm._v("Technology")])]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group input-group-catalog" }, [
      _c("span", { staticClass: "search-span" }, [_vm._v("Culoare")]),
      _vm._v(" "),
      _c(
        "select",
        { staticClass: "form-control", attrs: { id: "input-color" } },
        [_c("option", { attrs: { selected: "" } }, [_vm._v("All")])]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "d-flex form-catalog-buttons justify-content-between" },
      [
        _c(
          "button",
          { staticClass: "btn btn-apply", attrs: { type: "submit" } },
          [_vm._v("Apply")]
        ),
        _vm._v(" "),
        _c(
          "button",
          { staticClass: "btn btn-clear", attrs: { type: "reset" } },
          [_vm._v("Clear all")]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/NotFound.vue?vue&type=template&id=5dcdfd0e&scoped=true&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/NotFound.vue?vue&type=template&id=5dcdfd0e&scoped=true& ***!
  \***************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("p", [_vm._v("Not here, buddy!")])
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);