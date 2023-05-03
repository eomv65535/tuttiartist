(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/Publicaciones/Index.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Pages/Publicaciones/Index.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @inertiajs/inertia */ "./node_modules/@inertiajs/inertia/dist/index.js");
/* harmony import */ var _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__);

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      publicaciones: [],
      // Lista de publicaciones
      mostrarFormularioComentario: false,
      // Indicador para mostrar/ocultar formulario de comentario
      nuevoComentario: '' // Nuevo comentario a agregar
    };
  },
  mounted: function mounted() {
    this.obtenerPublicaciones(); // Llamar a la función para obtener las publicaciones al cargar el componente
  },

  methods: {
    obtenerPublicaciones: function obtenerPublicaciones() {
      var _this = this;
      // Llamada a la API para obtener las publicaciones
      _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__["Inertia"].get('/publicaciones').then(function (response) {
        _this.publicaciones = response.data;
      })["catch"](function (error) {
        console.error(error);
      });
    },
    darMeGusta: function darMeGusta(id) {
      // Llamada a la API para dar "Me Gusta" a una publicación
      _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__["Inertia"].post("/publicaciones/".concat(id, "/me-gusta")).then(function () {
        // Actualizar la vista o realizar acciones adicionales después de dar "Me Gusta"
        // ...
      })["catch"](function (error) {
        console.error(error);
      });
    },
    agregarComentario: function agregarComentario(id) {
      this.mostrarFormularioComentario = true;
    },
    guardarComentario: function guardarComentario() {
      var _this2 = this;
      // Llamada a la API para guardar un nuevo comentario
      _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__["Inertia"].post('/comentarios', {
        comentario: this.nuevoComentario
      }).then(function () {
        // Actualizar la vista o realizar acciones adicionales después de guardar el comentario
        // ...
        _this2.mostrarFormularioComentario = false; // Ocultar formulario de comentario después de guardar
        _this2.nuevoComentario = ''; // Limpiar el campo de nuevo comentario
      })["catch"](function (error) {
        console.error(error);
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/Publicaciones/Index.vue?vue&type=template&id=37e9fdd5&":
/*!***********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Pages/Publicaciones/Index.vue?vue&type=template&id=37e9fdd5& ***!
  \***********************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", [_vm._v("\n publicaciones\n  "), _c("ul", _vm._l(_vm.publicaciones, function (publicacion) {
    return _c("li", {
      key: publicacion.id
    }, [_vm._v("\n      " + _vm._s(publicacion.titulo) + " - " + _vm._s(publicacion.descripcion) + "\n      "), _c("button", {
      on: {
        click: function click($event) {
          return _vm.darMeGusta(publicacion.id);
        }
      }
    }, [_vm._v("Me Gusta")]), _vm._v(" "), _c("button", {
      on: {
        click: function click($event) {
          return _vm.agregarComentario(publicacion.id);
        }
      }
    }, [_vm._v("Agregar Comentario")])]);
  }), 0), _vm._v(" "), _vm.mostrarFormularioComentario ? _c("form", [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.nuevoComentario,
      expression: "nuevoComentario"
    }],
    attrs: {
      type: "text",
      placeholder: "Nuevo Comentario"
    },
    domProps: {
      value: _vm.nuevoComentario
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.nuevoComentario = $event.target.value;
      }
    }
  }), _vm._v(" "), _c("button", {
    on: {
      click: _vm.guardarComentario
    }
  }, [_vm._v("Guardar")])]) : _vm._e()]);
};
var staticRenderFns = [];
render._withStripped = true;


/***/ }),

/***/ "./resources/js/Pages/Publicaciones/Index.vue":
/*!****************************************************!*\
  !*** ./resources/js/Pages/Publicaciones/Index.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Index_vue_vue_type_template_id_37e9fdd5___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Index.vue?vue&type=template&id=37e9fdd5& */ "./resources/js/Pages/Publicaciones/Index.vue?vue&type=template&id=37e9fdd5&");
/* harmony import */ var _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Index.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Publicaciones/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Index_vue_vue_type_template_id_37e9fdd5___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Index_vue_vue_type_template_id_37e9fdd5___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Publicaciones/Index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Publicaciones/Index.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/Pages/Publicaciones/Index.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/Publicaciones/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Pages/Publicaciones/Index.vue?vue&type=template&id=37e9fdd5&":
/*!***********************************************************************************!*\
  !*** ./resources/js/Pages/Publicaciones/Index.vue?vue&type=template&id=37e9fdd5& ***!
  \***********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_37e9fdd5___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=template&id=37e9fdd5& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/Publicaciones/Index.vue?vue&type=template&id=37e9fdd5&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_37e9fdd5___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_37e9fdd5___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ 1:
/*!********************************!*\
  !*** ./util.inspect (ignored) ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* (ignored) */

/***/ })

}]);