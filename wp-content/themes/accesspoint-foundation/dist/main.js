/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/js/ajax-search.js"
/*!**********************************!*\
  !*** ./assets/js/ajax-search.js ***!
  \**********************************/
() {

function _regenerator() { /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/babel/babel/blob/main/packages/babel-helpers/LICENSE */ var e, t, r = "function" == typeof Symbol ? Symbol : {}, n = r.iterator || "@@iterator", o = r.toStringTag || "@@toStringTag"; function i(r, n, o, i) { var c = n && n.prototype instanceof Generator ? n : Generator, u = Object.create(c.prototype); return _regeneratorDefine2(u, "_invoke", function (r, n, o) { var i, c, u, f = 0, p = o || [], y = !1, G = { p: 0, n: 0, v: e, a: d, f: d.bind(e, 4), d: function d(t, r) { return i = t, c = 0, u = e, G.n = r, a; } }; function d(r, n) { for (c = r, u = n, t = 0; !y && f && !o && t < p.length; t++) { var o, i = p[t], d = G.p, l = i[2]; r > 3 ? (o = l === n) && (u = i[(c = i[4]) ? 5 : (c = 3, 3)], i[4] = i[5] = e) : i[0] <= d && ((o = r < 2 && d < i[1]) ? (c = 0, G.v = n, G.n = i[1]) : d < l && (o = r < 3 || i[0] > n || n > l) && (i[4] = r, i[5] = n, G.n = l, c = 0)); } if (o || r > 1) return a; throw y = !0, n; } return function (o, p, l) { if (f > 1) throw TypeError("Generator is already running"); for (y && 1 === p && d(p, l), c = p, u = l; (t = c < 2 ? e : u) || !y;) { i || (c ? c < 3 ? (c > 1 && (G.n = -1), d(c, u)) : G.n = u : G.v = u); try { if (f = 2, i) { if (c || (o = "next"), t = i[o]) { if (!(t = t.call(i, u))) throw TypeError("iterator result is not an object"); if (!t.done) return t; u = t.value, c < 2 && (c = 0); } else 1 === c && (t = i["return"]) && t.call(i), c < 2 && (u = TypeError("The iterator does not provide a '" + o + "' method"), c = 1); i = e; } else if ((t = (y = G.n < 0) ? u : r.call(n, G)) !== a) break; } catch (t) { i = e, c = 1, u = t; } finally { f = 1; } } return { value: t, done: y }; }; }(r, o, i), !0), u; } var a = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} t = Object.getPrototypeOf; var c = [][n] ? t(t([][n]())) : (_regeneratorDefine2(t = {}, n, function () { return this; }), t), u = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(c); function f(e) { return Object.setPrototypeOf ? Object.setPrototypeOf(e, GeneratorFunctionPrototype) : (e.__proto__ = GeneratorFunctionPrototype, _regeneratorDefine2(e, o, "GeneratorFunction")), e.prototype = Object.create(u), e; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, _regeneratorDefine2(u, "constructor", GeneratorFunctionPrototype), _regeneratorDefine2(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = "GeneratorFunction", _regeneratorDefine2(GeneratorFunctionPrototype, o, "GeneratorFunction"), _regeneratorDefine2(u), _regeneratorDefine2(u, o, "Generator"), _regeneratorDefine2(u, n, function () { return this; }), _regeneratorDefine2(u, "toString", function () { return "[object Generator]"; }), (_regenerator = function _regenerator() { return { w: i, m: f }; })(); }
function _regeneratorDefine2(e, r, n, t) { var i = Object.defineProperty; try { i({}, "", {}); } catch (e) { i = 0; } _regeneratorDefine2 = function _regeneratorDefine(e, r, n, t) { function o(r, n) { _regeneratorDefine2(e, r, function (e) { return this._invoke(r, n, e); }); } r ? i ? i(e, r, { value: n, enumerable: !t, configurable: !t, writable: !t }) : e[r] = n : (o("next", 0), o("throw", 1), o("return", 2)); }, _regeneratorDefine2(e, r, n, t); }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
document.addEventListener('DOMContentLoaded', function () {
  var input = document.getElementById('blog-search-input');
  var container = document.querySelector('.blog__archive--inner');
  if (!input || !container || typeof ajaxSearchData === 'undefined') {
    return;
  }
  var debounceTimer;
  var controller;
  var runSearch = /*#__PURE__*/function () {
    var _ref = _asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee(term) {
      var formData, response, data, _t;
      return _regenerator().w(function (_context) {
        while (1) switch (_context.p = _context.n) {
          case 0:
            if (controller) {
              controller.abort();
            }
            controller = new AbortController();
            formData = new FormData();
            formData.append('action', 'ajax_search_posts');
            formData.append('nonce', ajaxSearchData.nonce);
            formData.append('term', term);
            container.classList.add('is-loading');
            _context.p = 1;
            _context.n = 2;
            return fetch(ajaxSearchData.ajax_url, {
              method: 'POST',
              body: formData,
              credentials: 'same-origin',
              signal: controller.signal
            });
          case 2:
            response = _context.v;
            if (response.ok) {
              _context.n = 3;
              break;
            }
            throw new Error("HTTP error: ".concat(response.status));
          case 3:
            _context.n = 4;
            return response.json();
          case 4:
            data = _context.v;
            if (data.success) {
              container.innerHTML = data.data.html;
            }
            _context.n = 6;
            break;
          case 5:
            _context.p = 5;
            _t = _context.v;
            if (_t.name !== 'AbortError') {
              console.error('Search request failed:', _t);
            }
          case 6:
            _context.p = 6;
            container.classList.remove('is-loading');
            return _context.f(6);
          case 7:
            return _context.a(2);
        }
      }, _callee, null, [[1, 5, 6, 7]]);
    }));
    return function runSearch(_x) {
      return _ref.apply(this, arguments);
    };
  }();
  input.addEventListener('input', function (event) {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(function () {
      runSearch(event.target.value.trim());
    }, 300);
  });
});

/***/ },

/***/ "./assets/js/clickbox.js"
/*!*******************************!*\
  !*** ./assets/js/clickbox.js ***!
  \*******************************/
() {

jQuery(document).ready(function ($) {
  $(".clickBox").click(function () {
    window.location = $(this).find("a").attr("href");
    return false;
  });
});

/***/ },

/***/ "./assets/js/menu.js"
/*!***************************!*\
  !*** ./assets/js/menu.js ***!
  \***************************/
() {

(function ($) {
  'use strict';

  $(function () {
    var $body = $('body');
    var $toggle = $('.nav-toggle');
    var $nav = $('#primary-menu');
    var $navItems = $nav.find('.nav__item');
    var $window = $(window);
    var breakpoint = 1200;
    var staggerStep = 250;
    var $overlay = $('<div class="nav-overlay"></div>').appendTo($body);
    function setStaggerDelays() {
      $navItems.each(function (index) {
        $(this).css('transition-delay', index * staggerStep + 'ms');
      });
    }
    function clearStaggerDelays() {
      $navItems.css('transition-delay', '');
    }
    function openMenu() {
      setStaggerDelays();
      $nav.addClass('nav--active');
      $toggle.addClass('nav-toggle--active').attr('aria-expanded', 'true');
      $overlay.addClass('nav-overlay--active');
      $body.addClass('nav-open');
    }
    function closeMenu() {
      $nav.removeClass('nav--active');
      $toggle.removeClass('nav-toggle--active').attr('aria-expanded', 'false');
      $overlay.removeClass('nav-overlay--active');
      $body.removeClass('nav-open');
      closeAllSubmenus();
      clearStaggerDelays();
    }
    function closeAllSubmenus() {
      $('.nav__item--open').removeClass('nav__item--open').find('> .nav__toggle, > .nav__link').attr('aria-expanded', 'false');
    }
    $toggle.on('click', function () {
      $nav.hasClass('nav--active') ? closeMenu() : openMenu();
    });
    $overlay.on('click', closeMenu);

    // Submenu toggle (mobile)
    $nav.on('click', '.nav__toggle', function (e) {
      e.preventDefault();
      var $button = $(this);
      var $item = $button.closest('.nav__item');
      var isOpen = $item.hasClass('nav__item--open');

      // Accordion: close siblings first
      $item.siblings().removeClass('nav__item--open').find('> .nav__toggle, > .nav__link').attr('aria-expanded', 'false');
      $item.toggleClass('nav__item--open', !isOpen);
      $button.attr('aria-expanded', !isOpen);
      $item.find('> .nav__link').attr('aria-expanded', !isOpen);
    });

    // Escape key closes everything
    $(document).on('keydown', function (e) {
      if (e.key === 'Escape') {
        closeMenu();
      }
    });

    // Click outside closes desktop dropdowns
    $(document).on('click', function (e) {
      if (!$(e.target).closest('.nav').length) {
        closeAllSubmenus();
      }
    });

    // Reset state when crossing the breakpoint
    var currentWidth = $window.width();
    $window.on('resize', function () {
      var newWidth = $window.width();
      var crossed = currentWidth < breakpoint && newWidth >= breakpoint || currentWidth >= breakpoint && newWidth < breakpoint;
      if (crossed) {
        closeMenu();
      }
      currentWidth = newWidth;
    });
  });
})(jQuery);

/***/ }

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	const __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		const cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		const module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		if (!(moduleId in __webpack_modules__)) {
/******/ 			delete __webpack_module_cache__[moduleId];
/******/ 			const e = new Error("Cannot find module '" + moduleId + "'");
/******/ 			e.code = 'MODULE_NOT_FOUND';
/******/ 			throw e;
/******/ 		}
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			const getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter/value functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			if(Array.isArray(definition)) {
/******/ 				var i = 0;
/******/ 				while(i < definition.length) {
/******/ 					var key = definition[i++];
/******/ 					var binding = definition[i++];
/******/ 					if(!__webpack_require__.o(exports, key)) {
/******/ 						if(binding === 0) {
/******/ 							Object.defineProperty(exports, key, { enumerable: true, value: definition[i++] });
/******/ 						} else {
/******/ 							Object.defineProperty(exports, key, { enumerable: true, get: binding });
/******/ 						}
/******/ 					} else if(binding === 0) { i++; }
/******/ 				}
/******/ 			} else {
/******/ 				for(var key in definition) {
/******/ 					if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 						Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 					}
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
let __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be in strict mode.
(() => {
"use strict";
/*!***************************!*\
  !*** ./assets/js/main.js ***!
  \***************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _assets_js_menu_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../../../../../assets/js/menu.js */ "./assets/js/menu.js");
/* harmony import */ var _assets_js_menu_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_assets_js_menu_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _assets_js_ajax_search_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../../../../../../assets/js/ajax-search.js */ "./assets/js/ajax-search.js");
/* harmony import */ var _assets_js_ajax_search_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_assets_js_ajax_search_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _assets_js_clickbox_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../../../../assets/js/clickbox.js */ "./assets/js/clickbox.js");
/* harmony import */ var _assets_js_clickbox_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_assets_js_clickbox_js__WEBPACK_IMPORTED_MODULE_2__);



})();

/******/ })()
;
//# sourceMappingURL=main.js.map