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
      category: null,
      subcategory: null,
      colors: null,
      search: null,
      query_colors: null,
      query_subcategory: null,
      query_category: null,
      query_search: null,
      per_page: 12,
      current_page: 1,
      products: null,
      nr_products: this.$store.getters.getCount,
      categories: this.$store.getters.getCategories,
      show_filter: false,
      error: null
    };
  },
  watch: {
    category: function category(val) {
      this.subcategory = null;
    },
    show_filter: function show_filter(val) {
      this.closeFilter();
    },
    selected_category: function selected_category(val) {
      this.resetFilter();
      this.query_category = val;
      this.category = this.categories.find(function (el) {
        return el.name_ro == val;
      });
      this.changeUrl();
    }
  },
  computed: {
    subcategoryOptions: function subcategoryOptions() {
      if (this.category != null) {
        return this.category.subcategories;
      } else return [];
    },
    selected_category: function selected_category() {
      return this.$store.getters.getSelected;
    }
  },
  created: function created() {
    var _this = this;

    if (this.$route.query.search != undefined) {
      this.query_search = this.$route.query.search;
      this.search = this.$route.query.search;
    }

    if (this.$route.query.category != undefined) {
      this.category = this.categories.find(function (el) {
        return el.name_ro == decodeURIComponent(_this.$route.query.category);
      });
      this.query_category = decodeURIComponent(this.$route.query.category);
    }

    if (this.$route.query.subcategory != undefined) {
      this.subcategory = this.category.subcategories.find(function (el) {
        return el.name_ro == decodeURIComponent(_this.$route.query.subcategory);
      });
      this.query_subcategory = decodeURIComponent(this.$route.query.subcategory);
    }

    if (this.$route.query.colors != undefined) {
      this.colors = this.$route.query.color;
    }

    if (this.$route.query.current_page != undefined) {
      this.current_page = parseInt(this.$route.query.current_page);
    }

    this.showProducts();
  },
  methods: {
    showProducts: function showProducts() {
      var _this2 = this;

      axios.post('/api/products', {
        colors: this.query_colors,
        subcategory: this.query_subcategory,
        category: this.query_category,
        search: this.query_search,
        per_page: this.per_page,
        current_page: this.current_page
      }).then(function (response) {
        _this2.nr_products = response.data.nr_products;
        _this2.products = response.data.products;
      })["catch"](function (error) {});
    },
    changeFilter: function changeFilter(e) {
      e.preventDefault();

      if (this.search != null || this.category != null || this.subcategory != null || this.colors != null) {
        this.query_search = this.search != null ? this.search : null;
        this.query_category = this.category != null ? this.category.name_ro : null;
        this.query_subcategory = this.subcategory != null ? this.subcategory.name_ro : null;
        this.query_colors = this.colors != null ? this.colors : null;
        this.current_page = 1;
        this.changeUrl();
      }

      this.show_filter = false;
    },
    changeUrl: function changeUrl() {
      var query = {};

      if (this.query_search != null) {
        query.search = this.query_search;
      }

      if (this.query_category != null) {
        query.category = encodeURIComponent(this.query_category);
      }

      if (this.query_subcategory != null) {
        query.subcategory = encodeURIComponent(this.query_subcategory);
      }

      if (this.query_colors != null) {
        query.colors = this.query_colors;
      }

      if (this.current_page != 1) {
        query.current_page = this.current_page;
      }

      this.$router.replace({
        'query': query
      })["catch"](function (err) {
        return err;
      });
      this.showProducts();
    },
    resetFilter: function resetFilter() {
      if (this.search != null || this.category != null || this.subcategory != null || this.colors != null) {
        this.current_page = 1;
      }

      this.query_search = null;
      this.query_category = null;
      this.query_subcategory = null;
      this.query_colors = null;

      if (this.current_page != 1) {
        this.$router.replace({
          'query': {
            current_page: this.current_page
          }
        })["catch"](function (err) {
          return err;
        });
      } else this.$router.replace({
        'query': null
      })["catch"](function (err) {
        return err;
      });

      this.show_filter = false;
    },
    closeFilter: function closeFilter() {
      var _this3 = this;

      this.category = this.category != null ? this.categories.find(function (el) {
        return el.name_ro == decodeURIComponent(_this3.query_category);
      }) : null;
      this.subcategory = this.subcategory != null ? this.category.subcategories.find(function (el) {
        return el.name_ro == decodeURIComponent(_this3.query_subcategory);
      }) : null;
      this.colors = this.query_colors;
      this.search = this.query_search;
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
          _c("div", { staticClass: "breadcrumbs order-2 order-lg-1" }, [
            this.$route.query.category == undefined
              ? _c("a", [_vm._v("Home / All /")])
              : _c("a", [
                  _vm._v(
                    "Home / " +
                      _vm._s(decodeURIComponent(this.$route.query.category)) +
                      " /"
                  )
                ])
          ]),
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
                      on: {
                        submit: function($event) {
                          $event.preventDefault()
                        }
                      }
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
                      _c(
                        "div",
                        { staticClass: "input-group input-group-catalog" },
                        [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.search,
                                expression: "search"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "COD PRODUS / CUVÂNT",
                              "aria-label": "Username",
                              "aria-describedby": "search"
                            },
                            domProps: { value: _vm.search },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.search = $event.target.value
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm._m(0)
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        { staticClass: "input-group input-group-catalog" },
                        [
                          _c("span", { staticClass: "search-span" }, [
                            _vm._v("Categorie")
                          ]),
                          _vm._v(" "),
                          _c(
                            "b-form-select",
                            {
                              staticClass: "form-control",
                              attrs: { id: "input-category" },
                              model: {
                                value: _vm.category,
                                callback: function($$v) {
                                  _vm.category = $$v
                                },
                                expression: "category"
                              }
                            },
                            [
                              _c("option", { domProps: { value: null } }, [
                                _vm._v("All")
                              ]),
                              _vm._v(" "),
                              _vm._l(_vm.categories, function(category) {
                                return _c(
                                  "option",
                                  { domProps: { value: category } },
                                  [_vm._v(_vm._s(category.name_ro))]
                                )
                              })
                            ],
                            2
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        { staticClass: "input-group input-group-catalog" },
                        [
                          _c("span", { staticClass: "search-span" }, [
                            _vm._v("Subcategorie")
                          ]),
                          _vm._v(" "),
                          _c(
                            "b-form-select",
                            {
                              staticClass: "form-control",
                              attrs: { id: "input-category" },
                              model: {
                                value: _vm.subcategory,
                                callback: function($$v) {
                                  _vm.subcategory = $$v
                                },
                                expression: "subcategory"
                              }
                            },
                            [
                              _c("option", { domProps: { value: null } }, [
                                _vm._v("All")
                              ]),
                              _vm._v(" "),
                              _vm._l(_vm.subcategoryOptions, function(
                                subcategory
                              ) {
                                return _c(
                                  "option",
                                  { domProps: { value: subcategory } },
                                  [_vm._v(_vm._s(subcategory.name_ro))]
                                )
                              })
                            ],
                            2
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _vm._m(1),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass:
                            "d-flex form-catalog-buttons justify-content-between"
                        },
                        [
                          _c(
                            "button",
                            {
                              staticClass: "btn btn-apply",
                              on: { click: _vm.changeFilter }
                            },
                            [_vm._v("Apply")]
                          ),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass: "btn btn-clear",
                              on: { click: _vm.resetFilter }
                            },
                            [_vm._v("Clear all")]
                          )
                        ]
                      )
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
          "per-page": _vm.per_page,
          size: "lg"
        },
        on: { input: _vm.changeUrl },
        model: {
          value: _vm.current_page,
          callback: function($$v) {
            _vm.current_page = $$v
          },
          expression: "current_page "
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
    return _c("div", { staticClass: "input-group-prepend" }, [
      _c("span", { staticClass: "input-group-text", attrs: { id: "search" } }, [
        _c("img", {
          staticClass: "img-fluid",
          attrs: {
            src: "/img/icon_search.png",
            srcset: "/img/icon_search.svg" + " 1x",
            alt: "icon-search"
          }
        })
      ]),
      _vm._v(" "),
      _c("span", { staticClass: "search-span", attrs: { for: "#search" } }, [
        _vm._v("Search")
      ])
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