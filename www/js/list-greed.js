webpackJsonp([3],{

/***/ "./resources/assets/js/libs/jscript_stotal-storage.min.js":
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

/*
 * TotalStorage
 *
 * Copyright (c) 2012 Jared Novack & Upstatement (upstatement.com)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * Total Storage is the conceptual the love child of jStorage by Andris Reinman, 
 * and Cookie by Klaus Hartl -- though this is not connected to either project.
 *
 * @name $.totalStorage
 * @cat Plugins/Cookie
 * @author Jared Novack/jared@upstatement.com
 * @version 1.1.2
 * @url http://upstatement.com/blog/2012/01/jquery-local-storage-done-right-and-easy/
 */
(function ($) {
  var ls = window.localStorage;var supported;if (typeof ls == 'undefined' || typeof window.JSON == 'undefined') {
    supported = false;
  } else {
    supported = true;
  }
  $.totalStorage = function (key, value, options) {
    return $.totalStorage.impl.init(key, value);
  };
  $.totalStorage.setItem = function (key, value) {
    return $.totalStorage.impl.setItem(key, value);
  };
  $.totalStorage.getItem = function (key) {
    return $.totalStorage.impl.getItem(key);
  };
  $.totalStorage.getAll = function () {
    return $.totalStorage.impl.getAll();
  };
  $.totalStorage.deleteItem = function (key) {
    return $.totalStorage.impl.deleteItem(key);
  };
  $.totalStorage.impl = { init: function init(key, value) {
      if (typeof value != 'undefined') {
        return this.setItem(key, value);
      } else {
        return this.getItem(key);
      }
    }, setItem: function setItem(key, value) {
      if (!supported) {
        try {
          $.cookie(key, value);return value;
        } catch (e) {
          console.log('Local Storage not supported by this browser. Install the cookie plugin on your site to take advantage of the same functionality. You can get it at https://github.com/carhartl/jquery-cookie');
        }
      }
      var saver = JSON.stringify(value);ls.setItem(key, saver);return this.parseResult(saver);
    }, getItem: function getItem(key) {
      if (!supported) {
        try {
          return this.parseResult($.cookie(key));
        } catch (e) {
          return null;
        }
      }
      return this.parseResult(ls.getItem(key));
    }, deleteItem: function deleteItem(key) {
      if (!supported) {
        try {
          $.cookie(key, null);return true;
        } catch (e) {
          return false;
        }
      }
      ls.removeItem(key);return true;
    }, getAll: function getAll() {
      var items = new Array();if (!supported) {
        try {
          var pairs = document.cookie.split(";");for (var i = 0; i < pairs.length; i++) {
            var pair = pairs[i].split('=');var key = pair[0];items.push({ key: key, value: this.parseResult($.cookie(key)) });
          }
        } catch (e) {
          return null;
        }
      } else {
        for (var i in ls) {
          if (i.length) {
            items.push({ key: i, value: this.parseResult(ls.getItem(i)) });
          }
        }
      }
      return items;
    }, parseResult: function parseResult(res) {
      var ret;try {
        ret = JSON.parse(res);if (ret == 'true') {
          ret = true;
        }
        if (ret == 'false') {
          ret = false;
        }
        if (parseFloat(ret) == ret && (typeof ret === 'undefined' ? 'undefined' : _typeof(ret)) != "object") {
          ret = parseFloat(ret);
        }
      } catch (e) {}
      return ret;
    } };
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/list-greed.js":
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {/* Catalog list/grid script */
__webpack_require__("./resources/assets/js/libs/jscript_stotal-storage.min.js");
var nbItemsPerLine = 4;
var nbItemsPerLineMobile = 3;
var nbItemsPerLineTablet = 2;

function display(view) {
	if (view == 'list') {

		$('.grid-desc').css('display', 'none');
		$('.list-desc').css('display', 'block');
		$('ul.product_list').removeClass('grid').addClass('list row');
		$('.product_list > li').removeClass('col-xs-12 col-sm-' + 12 / nbItemsPerLineTablet + ' col-md-' + 12 / nbItemsPerLine).addClass('col-xs-12');
		$('.product_list > li').each(function (index, element) {
			html = '';
			html = '<div class="product-col list">';
			html += '<div class="row">';
			html += '<div class="img col-xs-3 col-md-4">' + $(element).find('.img').html() + '</div>';
			html += '<div class="center-block col-xs-5 col-md-4">';
			html += '<h5 itemprop="name">' + $(element).find('h5').html() + '</h5>';
			html += '<div itemprop="description" class="text">' + $(element).find('.text').html() + '</div>';
			html += '<ul class="options text"><li>' + $(element).find('.model').html() + '</li><li>' + $(element).find('.brand').html() + '</li><li>' + $(element).find('.weight').html() + '</li></ul>';
			html += '</div>';
			html += '<div class="right-block col-xs-4 col-md-4">';
			var price = $(element).find('.content_price').html(); // check : catalog mode is enabled
			if (price != null) {
				html += '<div class="content_price">' + price + '</div>';
			}
			html += '<div class="buttons">' + $(element).find('.buttons').html() + '</div>';
			html += '</div>';
			html += '</div>';

			html += '</div>';
			$(element).html(html);
		});
		$('.listing_view').find('li#list').addClass('active');
		$('.listing_view').find('li#grid').removeAttr('class');
		$.totalStorage('display', 'list');
	} else {

		$('.grid-desc').css('display', 'block');
		$('.list-desc').css('display', 'none');
		$('ul.product_list').removeClass('list').addClass('grid row');
		$('.product_list > li').removeClass('col-xs-12').addClass('col-xs-12 col-sm-' + 12 / nbItemsPerLineTablet + ' col-md-' + 12 / nbItemsPerLine);
		$('.product_list > li').each(function (index, element) {
			html = '';
			html += '<div class="product-col">';
			html += '<div class="img">' + $(element).find('.img').html() + '</div>';
			html += '<div class="prod-info">';
			html += '<h5 itemprop="name">' + $(element).find('h5').html() + '</h5>';
			html += '<div itemprop="description" class="text">' + $(element).find('.text').html() + '</div>';
			html += '<div class="product-buttons">';
			var price = $(element).find('.content_price').html(); // check : catalog mode is enabled
			if (price != null) {
				html += '<div class="content_price">' + price + '</div>';
			}
			html += '<div class="buttons">' + $(element).find('.buttons').html() + '</div>';
			html += '</div>';
			html += '</div>';
			$(element).html(html);
		});
		$('.listing_view').find('li#grid').addClass('active');
		$('.listing_view').find('li#list').removeAttr('class');
		$.totalStorage('display', 'grid');
	}
}
function bindGrid() {
	var view = $.totalStorage('display');

	if (view && view != 'grid') {
		display(view);
	} else {
		display(view);
		$('.listing_view').find('li#grid').addClass('active');
	}

	$(document).on('click', '#grid', function (e) {
		e.preventDefault();
		display('grid');
	});

	$(document).on('click', '#list', function (e) {
		e.preventDefault();
		display('list');
	});
}

$(document).ready(function () {
	bindGrid();
});
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ 2:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/list-greed.js");


/***/ })

},[2]);