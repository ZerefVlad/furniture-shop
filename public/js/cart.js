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
/******/ 	return __webpack_require__(__webpack_require__.s = 58);
/******/ })
/************************************************************************/
/******/ ({

/***/ 58:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(59);


/***/ }),

/***/ 59:
/***/ (function(module, exports) {

$(document).ready(function () {
    if (sessionStorage.getItem('counter') !== null && sessionStorage.getItem('counter') !== undefined) {
        var badge = $('#cart-product-count');
        badge.attr('data-count', parseInt(sessionStorage.getItem('counter')));
        badge.html(parseInt(sessionStorage.getItem('counter')));
    }

    $('#add_to_cart').click(function (e) {
        var badge = $('#cart-product-count');
        var counter = badge.attr('data-count');
        var quantity = $('#kolvo').val();
        var product_id = $('input[name="product_id"]').val();
        var check = true;

        counter = parseInt(counter) + parseInt(quantity);
        badge.attr('data-count', parseInt(counter));
        badge.html(parseInt(counter));

        console.log(counter);
        console.log(quantity);
        $.get({
            url: '/api/cart/add',
            data: {
                id: product_id,
                quantity: quantity
            }
        });
    });

    $('#delete-product-cart').click(function (event) {
        event.preventDefault();
        var id = event.target.getAttribute('data-id');
        console.log(event.target);
        $.get({
            url: '/api/cart/delete',
            data: {
                id: id
            },
            success: function success(data) {
                $('#cart-item-' + id).remove();
            }
        });
        updateTotal();
    });

    $('.quantity-cart').change(function (event) {
        var id = event.target.getAttribute('data-id');
        var quantity = event.target.value;
        if (parseInt(quantity) > 0) {
            $.get({
                url: '/api/cart/update-quantity',
                data: {
                    id: id,
                    quantity: quantity
                },
                success: function success(data) {
                    var cartItem = $('#cart-item-' + id);
                    var price = cartItem.children('.price');
                    price.html('Price: ' + data);
                }
            });
            updateTotal();
        }
    });

    $('.quantity-complex-cart').change(function (event) {
        var id = event.target.getAttribute('data-id');
        var quantity = event.target.value;
        if (parseInt(quantity) > 0) {
            $.get({
                url: '/api/cart/update-complex-quantity',
                data: {
                    id: id,
                    total_quantity: quantity
                },
                success: function success(data) {
                    var cartItem = $('.complex-item-' + id);
                    var complex_price = cartItem.children('.complex_price');
                    complex_price.html('Complex Price: ' + data);
                }
            });
            updateTotal();
        }
    });

    $('.related-product-add').click(function (e) {
        e.preventDefault();
        var id = e.target.getAttribute('data-id');
        var form = $('#related-product-cart-' + id);
        console.log(form);
        $.get({
            url: '/api/cart/add-complex',
            data: form.serialize()
        });
    });

    $('.delete-complex-cart').click(function (event) {
        event.preventDefault();
        var id = event.target.getAttribute('data-id');
        $.get({
            url: '/api/cart/delete-complex',
            data: {
                id: id
            },
            success: function success(data) {
                $('.complex-item-' + id).remove();
            }
        });
        updateTotal();
    });

    function updateTotal() {
        $.get({
            url: '/api/cart/total',
            success: function success(data) {
                $('#total-price').html(data);
                $('#total-price-input').val(data);
            }
        });
    }

    $.get({
        url: '/api/cart/get-cart',
        success: function success(data) {
            $('.wrapper').append(data);
        }
    });
});

/***/ })

/******/ });