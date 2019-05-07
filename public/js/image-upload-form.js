/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 50);
/******/ })
/************************************************************************/
/******/ ({

/***/ 50:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(51);


/***/ }),

/***/ 51:
/***/ (function(module, exports) {

$('#picture-add').click(function (e) {
    e.preventDefault();
    var counter = $('.img-input').length;
    console.log(counter);
    var div = $('.images').first();
    div.append('<div class="col-md-12">' + '<input form="product-update-form"  type="text" name="img_alt[' + counter + ']">' + '<input form="product-update-form"  type="text" name="img_title[' + counter + ']">' + '<input form="product-update-form"  type="file" name="pictures[' + counter + ']" id="img-' + counter + '" class="img-input">' + '<img src="#" id="loader-' + counter + '" class="load-image" alt="">' + '</div>');
});

$('#picture-add-main-page').click(function (e) {
    e.preventDefault();
    var counter = $('.img-input').length;
    console.log(counter);
    var div = $('.images').first();
    div.append('<div class="col-md-12">' + '<input form="main-page-update-form"  type="text" name="img_alt[' + counter + ']">' + '<input form="main-page-update-form"  type="text" name="img_title[' + counter + ']">' + '<input form="main-page-update-form"  type="file" name="pictures[' + counter + ']" id="img-' + counter + '" class="img-input">' + '<img src="#" id="loader-' + counter + '" class="load-image" alt="">' + '</div>');
});

$(document).on('change', '.img-input', function (e) {
    var id = $(e.target).attr('id').split('-')[1];
    if (e.target.files && e.target.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#loader-' + id).attr('src', e.target.result).width(300).height(300);
        };

        reader.readAsDataURL(e.target.files[0]);
    }
});

/***/ })

/******/ });