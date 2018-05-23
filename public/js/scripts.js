webpackJsonp([1],{

/***/ "./resources/assets/js/jq_easing.1.3.js":
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend(jQuery.easing, {
	def: 'easeOutQuad',
	swing: function swing(x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function easeInQuad(x, t, b, c, d) {
		return c * (t /= d) * t + b;
	},
	easeOutQuad: function easeOutQuad(x, t, b, c, d) {
		return -c * (t /= d) * (t - 2) + b;
	},
	easeInOutQuad: function easeInOutQuad(x, t, b, c, d) {
		if ((t /= d / 2) < 1) return c / 2 * t * t + b;
		return -c / 2 * (--t * (t - 2) - 1) + b;
	},
	easeInCubic: function easeInCubic(x, t, b, c, d) {
		return c * (t /= d) * t * t + b;
	},
	easeOutCubic: function easeOutCubic(x, t, b, c, d) {
		return c * ((t = t / d - 1) * t * t + 1) + b;
	},
	easeInOutCubic: function easeInOutCubic(x, t, b, c, d) {
		if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
		return c / 2 * ((t -= 2) * t * t + 2) + b;
	},
	easeInQuart: function easeInQuart(x, t, b, c, d) {
		return c * (t /= d) * t * t * t + b;
	},
	easeOutQuart: function easeOutQuart(x, t, b, c, d) {
		return -c * ((t = t / d - 1) * t * t * t - 1) + b;
	},
	easeInOutQuart: function easeInOutQuart(x, t, b, c, d) {
		if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
		return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
	},
	easeInQuint: function easeInQuint(x, t, b, c, d) {
		return c * (t /= d) * t * t * t * t + b;
	},
	easeOutQuint: function easeOutQuint(x, t, b, c, d) {
		return c * ((t = t / d - 1) * t * t * t * t + 1) + b;
	},
	easeInOutQuint: function easeInOutQuint(x, t, b, c, d) {
		if ((t /= d / 2) < 1) return c / 2 * t * t * t * t * t + b;
		return c / 2 * ((t -= 2) * t * t * t * t + 2) + b;
	},
	easeInSine: function easeInSine(x, t, b, c, d) {
		return -c * Math.cos(t / d * (Math.PI / 2)) + c + b;
	},
	easeOutSine: function easeOutSine(x, t, b, c, d) {
		return c * Math.sin(t / d * (Math.PI / 2)) + b;
	},
	easeInOutSine: function easeInOutSine(x, t, b, c, d) {
		return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b;
	},
	easeInExpo: function easeInExpo(x, t, b, c, d) {
		return t == 0 ? b : c * Math.pow(2, 10 * (t / d - 1)) + b;
	},
	easeOutExpo: function easeOutExpo(x, t, b, c, d) {
		return t == d ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b;
	},
	easeInOutExpo: function easeInOutExpo(x, t, b, c, d) {
		if (t == 0) return b;
		if (t == d) return b + c;
		if ((t /= d / 2) < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
		return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function easeInCirc(x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t /= d) * t) - 1) + b;
	},
	easeOutCirc: function easeOutCirc(x, t, b, c, d) {
		return c * Math.sqrt(1 - (t = t / d - 1) * t) + b;
	},
	easeInOutCirc: function easeInOutCirc(x, t, b, c, d) {
		if ((t /= d / 2) < 1) return -c / 2 * (Math.sqrt(1 - t * t) - 1) + b;
		return c / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + b;
	},
	easeInElastic: function easeInElastic(x, t, b, c, d) {
		var s = 1.70158;var p = 0;var a = c;
		if (t == 0) return b;if ((t /= d) == 1) return b + c;if (!p) p = d * .3;
		if (a < Math.abs(c)) {
			a = c;var s = p / 4;
		} else var s = p / (2 * Math.PI) * Math.asin(c / a);
		return -(a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
	},
	easeOutElastic: function easeOutElastic(x, t, b, c, d) {
		var s = 1.70158;var p = 0;var a = c;
		if (t == 0) return b;if ((t /= d) == 1) return b + c;if (!p) p = d * .3;
		if (a < Math.abs(c)) {
			a = c;var s = p / 4;
		} else var s = p / (2 * Math.PI) * Math.asin(c / a);
		return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
	},
	easeInOutElastic: function easeInOutElastic(x, t, b, c, d) {
		var s = 1.70158;var p = 0;var a = c;
		if (t == 0) return b;if ((t /= d / 2) == 2) return b + c;if (!p) p = d * (.3 * 1.5);
		if (a < Math.abs(c)) {
			a = c;var s = p / 4;
		} else var s = p / (2 * Math.PI) * Math.asin(c / a);
		if (t < 1) return -.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
		return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b;
	},
	easeInBack: function easeInBack(x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c * (t /= d) * t * ((s + 1) * t - s) + b;
	},
	easeOutBack: function easeOutBack(x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b;
	},
	easeInOutBack: function easeInOutBack(x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		if ((t /= d / 2) < 1) return c / 2 * (t * t * (((s *= 1.525) + 1) * t - s)) + b;
		return c / 2 * ((t -= 2) * t * (((s *= 1.525) + 1) * t + s) + 2) + b;
	},
	easeInBounce: function easeInBounce(x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce(x, d - t, 0, c, d) + b;
	},
	easeOutBounce: function easeOutBounce(x, t, b, c, d) {
		if ((t /= d) < 1 / 2.75) {
			return c * (7.5625 * t * t) + b;
		} else if (t < 2 / 2.75) {
			return c * (7.5625 * (t -= 1.5 / 2.75) * t + .75) + b;
		} else if (t < 2.5 / 2.75) {
			return c * (7.5625 * (t -= 2.25 / 2.75) * t + .9375) + b;
		} else {
			return c * (7.5625 * (t -= 2.625 / 2.75) * t + .984375) + b;
		}
	},
	easeInOutBounce: function easeInOutBounce(x, t, b, c, d) {
		if (t < d / 2) return jQuery.easing.easeInBounce(x, t * 2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce(x, t * 2 - d, 0, c, d) * .5 + c * .5 + b;
	}
});

/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/js_top.js":
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {$(function () {
  // to top
  $().UItoTop({
    easingType: 'easeOutQuart'
  });
  // overlay hide
  $(".close_msg").click(function () {
    $(".layer_cart_overlay, .msg_hide, .messageStackSuccess.larger, .messageStackError.larger, .messageStackCaution.larger, .messageStackWarning").css("display", "none");
  });
});
$(function () {
  $('.messageStackSuccess').delay(4000).fadeOut('slow');
  $('.messageStackCaution').delay(4000).fadeOut('slow');
  $('.messageStackError').delay(4000).fadeOut('slow');
});
$(function () {
  $('#relatedProducts').ready(function () {
    $(".clearBoth").remove();
  });
});
$(function () {
  $(".mega-menu li").has('.dropdown').append("<span class='plus'></span>");
  $(".cat-title").click(function () {
    $("#mega-wrapper").stop(true).slideToggle(function () {
      $(".cat-title").stop(true).toggleClass('open');
    });
  });
  $(".search_btn").click(function () {
    $("#search_block").slideToggle("slow", function () {
      $("#search_block").prev().toggleClass("curr", $(this).is(":visible"));
      $("#search_block").stop();
    });
  });
  $(".lang_btn").click(function () {
    $("#currencies-block-top").slideToggle("slow", function () {
      $("#currencies-block-top").prev().toggleClass("curr", $(this).is(":visible"));
      $("#currencies-block-top").stop();
    });
  });
  $(".user_info").click(function () {
    $(".header_user_info").slideToggle("slow", function () {
      $(".header_user_info").prev().toggleClass("curr", $(this).is(":visible"));
      $(".header_user_info").stop();
    });
  });
  $(".mega-menu li .plus").click(function () {
    $(this).parent().find(".dropdown").slideToggle(function () {
      $(this).next().stop(true).toggleClass('open', $(this).is(":visible"));
    });
  });
  $(".menu_btn").click(function () {
    $(".header_user_info").slideToggle("slow", function () {
      $(".header_user_info").prev().toggleClass("curr", $(this).is(":visible"));
      $(".header_user_info").stop();
    });
  });
});
$(function () {
  if ($(window).width() <= 768) {

    //footer accordion
    $(".title_btn1").click(function () {
      $(".ezpagesFooterCol.col1").slideToggle("slow", function () {
        $(".ezpagesFooterCol.col1").prev().toggleClass("curr", $(this).is(":visible"));
        $(".ezpagesFooterCol.col1").stop();
      });
    });
    $(".title_btn2").click(function () {
      $(".account_list").slideToggle("slow", function () {
        $(".account_list").prev().toggleClass("curr", $(this).is(":visible"));
        $(".account_list").stop();
      });
    });
    $(".title_btn3").click(function () {
      $(".social_list").slideToggle("slow", function () {
        $(".social_list").prev().toggleClass("curr", $(this).is(":visible"));
        $(".social_list").stop();
      });
    });
    $(".title_btn4").click(function () {
      $(".contact_list").slideToggle("slow", function () {
        $(".contact_list").prev().toggleClass("curr", $(this).is(":visible"));
        $(".contact_list").stop();
      });
    });

    //column accordion
    $("#tm_categories_block .module-heading").click(function () {
      $("#tm_categories_block #tm_categories").slideToggle(function () {
        $("#tm_categories_block .module-heading").toggleClass('open', $(this).is(":visible"));
      });
    });
    $("#module_information .module-heading").click(function () {
      $("#module_information .block_content").slideToggle(function () {
        $("#module_information .module-heading").toggleClass('open');
      });
    });
    $("#module_languages .module-heading").click(function () {
      $("#module_languages .block_content").slideToggle(function () {
        $("#module_languages .module-heading").toggleClass('open');
      });
    });
    $("#module_shoppingcart .module-heading").click(function () {
      $("#module_shoppingcart .block_content").slideToggle(function () {
        $("#module_shoppingcart .module-heading").toggleClass('open');
      });
    });
    $("#module_reviews .module-heading").click(function () {
      $("#module_reviews .block_content").slideToggle(function () {
        $("#module_reviews .module-heading").toggleClass('open');
      });
    });
    $("#module_bestsellers .module-heading").click(function () {
      $("#module_bestsellers .block_content").slideToggle(function () {
        $("#module_bestsellers .module-heading").toggleClass('open');
      });
    });
    $("#module_whosonline .module-heading").click(function () {
      $("#module_whosonline .block_content").slideToggle(function () {
        $("#module_whosonline .module-heading").toggleClass('open');
      });
    });
    $("#module_currencies .module-heading").click(function () {
      $("#module_currencies .block_content").slideToggle(function () {
        $("#module_currencies .module-heading").toggleClass('open');
      });
    });
    $("#module_moreinformation .module-heading").click(function () {
      $("#module_moreinformation .block_content").slideToggle(function () {
        $("#module_moreinformation .module-heading").toggleClass('open');
      });
    });
    $("#module_search .module-heading").click(function () {
      $("#module_search .block_content").slideToggle(function () {
        $("#module_search .module-heading").toggleClass('open');
      });
    });
    $("#module_ezpages .module-heading").click(function () {
      $("#module_ezpages .block_content").slideToggle(function () {
        $("#module_ezpages .module-heading").toggleClass('open');
      });
    });
    $("#module_manufacturers .module-heading").click(function () {
      $("#module_manufacturers .block_content").slideToggle(function () {
        $("#module_manufacturers .module-heading").toggleClass('open');
      });
    });
    $("#module_whatsnew .module-heading").click(function () {
      $("#module_whatsnew .block_content").slideToggle(function () {
        $("#module_whatsnew .module-heading").toggleClass('open');
      });
    });
    $("#module_featured .module-heading").click(function () {
      $("#module_featured .block_content").slideToggle(function () {
        $("#module_featured .module-heading").toggleClass('open');
      });
    });
    $("#module_specials .module-heading").click(function () {
      $("#module_specials .block_content").slideToggle(function () {
        $("#module_specials .module-heading").toggleClass('open');
      });
    });
    $("#module_orderhistory .module-heading").click(function () {
      $("#module_orderhistory .block_content").slideToggle(function () {
        $("#module_orderhistory .module-heading").toggleClass('open');
      });
    });
  }
});

//categories
$(document).ready(function () {
  $('#tm_categories > ul li').has('.has_sub').append("<span class='grower CLOSE'></span>");
  $('.grower').click(function () {
    $(this).parent().children('ul li ul').toggle(300);
    $(this).toggleClass('CLOSE');
    $(this).toggleClass('OPEN');
  });
});
$(function () {
  $('#shopping_cart').click(function () {
    $(this).find("#shopping_cart_content").stop().slideToggle("slow");
  });
});
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/nivo-slider.js":
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {/*
 * jQuery Nivo Slider v3.1
 * http://nivo.dev7studios.com
 *
 * Copyright 2012, Dev7studios
 * Free to use and abuse under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 */

(function (a) {
  var b = function b(_b, c) {
    var d = a.extend({}, a.fn.nivoSlider.defaults, c);var e = { currentSlide: 0, currentImage: "", totalSlides: 0, running: false, paused: false, stop: false, controlNavEl: false };var f = a(_b);f.data("nivo:vars", e).addClass("nivoSlider");var g = f.children();g.each(function () {
      var b = a(this);var c = "";if (!b.is("img")) {
        if (b.is("a")) {
          b.addClass("nivo-imageLink");c = b;
        }b = b.find("img:first");
      }var d = d === 0 ? b.attr("width") : b.width(),
          f = f === 0 ? b.attr("height") : b.height();if (c !== "") {
        c.css("display", "none");
      }b.css("display", "none");e.totalSlides++;
    });if (d.randomStart) {
      d.startSlide = Math.floor(Math.random() * e.totalSlides);
    }if (d.startSlide > 0) {
      if (d.startSlide >= e.totalSlides) {
        d.startSlide = e.totalSlides - 1;
      }e.currentSlide = d.startSlide;
    }if (a(g[e.currentSlide]).is("img")) {
      e.currentImage = a(g[e.currentSlide]);
    } else {
      e.currentImage = a(g[e.currentSlide]).find("img:first");
    }if (a(g[e.currentSlide]).is("a")) {
      a(g[e.currentSlide]).css("display", "block");
    }var h = a('<img class="nivo-main-image" src="#" />');h.attr("src", e.currentImage.attr("src")).show();f.append(h);a(window).resize(function () {
      f.children("img").width(f.width());h.attr("src", e.currentImage.attr("src"));h.stop().height("auto");a(".nivo-slice").remove();a(".nivo-box").remove();
    });f.append(a('<div class="nivo-caption"></div>'));var i = function i(b) {
      var c = a(".nivo-caption", f);if (e.currentImage.attr("title") != "" && e.currentImage.attr("title") != undefined) {
        var d = e.currentImage.attr("title");if (d.substr(0, 1) == "#") d = a(d).html();if (c.css("display") == "block") {
          setTimeout(function () {
            c.html(d);
          }, b.animSpeed);
        } else {
          c.html(d);c.stop().fadeIn(b.animSpeed);
        }
      } else {
        c.stop().fadeOut(b.animSpeed);
      }
    };i(d);var j = 0;if (!d.manualAdvance && g.length > 1) {
      j = setInterval(function () {
        o(f, g, d, false);
      }, d.pauseTime);
    }if (d.directionNav) {
      f.append('<div class="nivo-directionNav"><a class="nivo-prevNav">' + d.prevText + '</a><a class="nivo-nextNav">' + d.nextText + "</a></div>");a("a.nivo-prevNav", f).on("click", function () {
        if (e.running) {
          return false;
        }clearInterval(j);j = "";e.currentSlide -= 2;o(f, g, d, "prev");
      });a("a.nivo-nextNav", f).on("click", function () {
        if (e.running) {
          return false;
        }clearInterval(j);j = "";o(f, g, d, "next");
      });
    }if (d.controlNav) {
      e.controlNavEl = a('<div class="nivo-controlNav"></div>');f.after(e.controlNavEl);for (var k = 0; k < g.length; k++) {
        if (d.controlNavThumbs) {
          e.controlNavEl.addClass("nivo-thumbs-enabled");var l = g.eq(k);if (!l.is("img")) {
            l = l.find("img:first");
          }if (l.attr("data-thumb")) e.controlNavEl.append('<a class="nivo-control" rel="' + k + '"></a>');
        } else {
          e.controlNavEl.append('<a class="nivo-control" rel="' + k + '"><span>' + (k + 1) + "</span></a>");
        }
      }a("a:eq(" + e.currentSlide + ")", e.controlNavEl).addClass("active");a("a", e.controlNavEl).bind("click", function () {
        if (e.running) return false;if (a(this).hasClass("active")) return false;clearInterval(j);j = "";h.attr("src", e.currentImage.attr("src"));e.currentSlide = a(this).attr("rel") - 1;o(f, g, d, "control");
      });
    }if (d.pauseOnHover) {
      f.hover(function () {
        e.paused = true;clearInterval(j);j = "";
      }, function () {
        e.paused = false;if (j === "" && !d.manualAdvance) {
          j = setInterval(function () {
            o(f, g, d, false);
          }, d.pauseTime);
        }
      });
    }f.bind("nivo:animFinished", function () {
      h.attr("src", e.currentImage.attr("src"));e.running = false;a(g).each(function () {
        if (a(this).is("a")) {
          a(this).css("display", "none");
        }
      });if (a(g[e.currentSlide]).is("a")) {
        a(g[e.currentSlide]).css("display", "block");
      }if (j === "" && !e.paused && !d.manualAdvance) {
        j = setInterval(function () {
          o(f, g, d, false);
        }, d.pauseTime);
      }d.afterChange.call(this);
    });var m = function m(b, c, d) {
      if (a(d.currentImage).parent().is("a")) a(d.currentImage).parent().css("display", "block");a('img[src="' + d.currentImage.attr("src") + '"]', b).not(".nivo-main-image,.nivo-control img").width(b.width()).css("visibility", "hidden").show();var e = a('img[src="' + d.currentImage.attr("src") + '"]', b).not(".nivo-main-image,.nivo-control img").parent().is("a") ? a('img[src="' + d.currentImage.attr("src") + '"]', b).not(".nivo-main-image,.nivo-control img").parent().height() : a('img[src="' + d.currentImage.attr("src") + '"]', b).not(".nivo-main-image,.nivo-control img").height();for (var f = 0; f < c.slices; f++) {
        var g = Math.round(b.width() / c.slices);if (f === c.slices - 1) {
          b.append(a('<div class="nivo-slice" name="' + f + '"><img src="' + d.currentImage.attr("src") + '" style="position:absolute; width:' + b.width() + "px; height:auto; display:block !important; top:0; left:-" + (g + f * g - g) + 'px;" /></div>').css({ left: g * f + "px", width: b.width() - g * f + "px", height: e + "px", opacity: "0", overflow: "hidden" }));
        } else {
          b.append(a('<div class="nivo-slice" name="' + f + '"><img src="' + d.currentImage.attr("src") + '" style="position:absolute; width:' + b.width() + "px; height:auto; display:block !important; top:0; left:-" + (g + f * g - g) + 'px;" /></div>').css({ left: g * f + "px", width: g + "px", height: e + "px", opacity: "0", overflow: "hidden" }));
        }
      }a(".nivo-slice", b).height(e);h.stop().animate({ height: a(d.currentImage).height() }, c.animSpeed);
    };var n = function n(b, c, d) {
      if (a(d.currentImage).parent().is("a")) a(d.currentImage).parent().css("display", "block");a('img[src="' + d.currentImage.attr("src") + '"]', b).not(".nivo-main-image,.nivo-control img").width(b.width()).css("visibility", "hidden").show();var e = Math.round(b.width() / c.boxCols),
          f = Math.round(a('img[src="' + d.currentImage.attr("src") + '"]', b).not(".nivo-main-image,.nivo-control img").height() / c.boxRows);for (var g = 0; g < c.boxRows; g++) {
        for (var i = 0; i < c.boxCols; i++) {
          if (i === c.boxCols - 1) {
            b.append(a('<div class="nivo-box" name="' + i + '" rel="' + g + '"><img src="' + d.currentImage.attr("src") + '" style="position:absolute; width:' + b.width() + "px; height:auto; display:block; top:-" + f * g + "px; left:-" + e * i + 'px;" /></div>').css({ opacity: 0, left: e * i + "px", top: f * g + "px", width: b.width() - e * i + "px" }));a('.nivo-box[name="' + i + '"]', b).height(a('.nivo-box[name="' + i + '"] img', b).height() + "px");
          } else {
            b.append(a('<div class="nivo-box" name="' + i + '" rel="' + g + '"><img src="' + d.currentImage.attr("src") + '" style="position:absolute; width:' + b.width() + "px; height:auto; display:block; top:-" + f * g + "px; left:-" + e * i + 'px;" /></div>').css({ opacity: 0, left: e * i + "px", top: f * g + "px", width: e + "px" }));a('.nivo-box[name="' + i + '"]', b).height(a('.nivo-box[name="' + i + '"] img', b).height() + "px");
          }
        }
      }h.stop().animate({ height: a(d.currentImage).height() }, c.animSpeed);
    };var o = function o(b, c, d, e) {
      var f = b.data("nivo:vars");if (f && f.currentSlide === f.totalSlides - 1) {
        d.lastSlide.call(this);
      }if ((!f || f.stop) && !e) {
        return false;
      }d.beforeChange.call(this);if (!e) {
        h.attr("src", f.currentImage.attr("src"));
      } else {
        if (e === "prev") {
          h.attr("src", f.currentImage.attr("src"));
        }if (e === "next") {
          h.attr("src", f.currentImage.attr("src"));
        }
      }f.currentSlide++;if (f.currentSlide === f.totalSlides) {
        f.currentSlide = 0;d.slideshowEnd.call(this);
      }if (f.currentSlide < 0) {
        f.currentSlide = f.totalSlides - 1;
      }if (a(c[f.currentSlide]).is("img")) {
        f.currentImage = a(c[f.currentSlide]);
      } else {
        f.currentImage = a(c[f.currentSlide]).find("img:first");
      }if (d.controlNav) {
        a("a", f.controlNavEl).removeClass("active");a("a:eq(" + f.currentSlide + ")", f.controlNavEl).addClass("active");
      }i(d);a(".nivo-slice", b).remove();a(".nivo-box", b).remove();var g = d.effect,
          j = "";if (d.effect === "random") {
        j = new Array("sliceDownRight", "sliceDownLeft", "sliceUpRight", "sliceUpLeft", "sliceUpDown", "sliceUpDownLeft", "fold", "fade", "boxRandom", "boxRain", "boxRainReverse", "boxRainGrow", "boxRainGrowReverse");g = j[Math.floor(Math.random() * (j.length + 1))];if (g === undefined) {
          g = "fade";
        }
      }if (d.effect.indexOf(",") !== -1) {
        j = d.effect.split(",");g = j[Math.floor(Math.random() * j.length)];if (g === undefined) {
          g = "fade";
        }
      }if (f.currentImage.attr("data-transition")) {
        g = f.currentImage.attr("data-transition");
      }f.running = true;var k = 0,
          l = 0,
          o = "",
          q = "",
          r = "",
          s = "";if (g === "sliceDown" || g === "sliceDownRight" || g === "sliceDownLeft") {
        m(b, d, f);k = 0;l = 0;o = a(".nivo-slice", b);if (g === "sliceDownLeft") {
          o = a(".nivo-slice", b)._reverse();
        }o.each(function () {
          var c = a(this);c.css({ top: "0px" });if (l === d.slices - 1) {
            setTimeout(function () {
              c.animate({ opacity: "1.0" }, d.animSpeed, "", function () {
                b.trigger("nivo:animFinished");
              });
            }, 100 + k);
          } else {
            setTimeout(function () {
              c.animate({ opacity: "1.0" }, d.animSpeed);
            }, 100 + k);
          }k += 50;l++;
        });
      } else if (g === "sliceUp" || g === "sliceUpRight" || g === "sliceUpLeft") {
        m(b, d, f);k = 0;l = 0;o = a(".nivo-slice", b);if (g === "sliceUpLeft") {
          o = a(".nivo-slice", b)._reverse();
        }o.each(function () {
          var c = a(this);c.css({ bottom: "0px" });if (l === d.slices - 1) {
            setTimeout(function () {
              c.animate({ opacity: "1.0" }, d.animSpeed, "", function () {
                b.trigger("nivo:animFinished");
              });
            }, 100 + k);
          } else {
            setTimeout(function () {
              c.animate({ opacity: "1.0" }, d.animSpeed);
            }, 100 + k);
          }k += 50;l++;
        });
      } else if (g === "sliceUpDown" || g === "sliceUpDownRight" || g === "sliceUpDownLeft") {
        m(b, d, f);k = 0;l = 0;var t = 0;o = a(".nivo-slice", b);if (g === "sliceUpDownLeft") {
          o = a(".nivo-slice", b)._reverse();
        }o.each(function () {
          var c = a(this);if (l === 0) {
            c.css("top", "0px");l++;
          } else {
            c.css("bottom", "0px");l = 0;
          }if (t === d.slices - 1) {
            setTimeout(function () {
              c.animate({ opacity: "1.0" }, d.animSpeed, "", function () {
                b.trigger("nivo:animFinished");
              });
            }, 100 + k);
          } else {
            setTimeout(function () {
              c.animate({ opacity: "1.0" }, d.animSpeed);
            }, 100 + k);
          }k += 50;t++;
        });
      } else if (g === "fold") {
        m(b, d, f);k = 0;l = 0;a(".nivo-slice", b).each(function () {
          var c = a(this);var e = c.width();c.css({ top: "0px", width: "0px" });if (l === d.slices - 1) {
            setTimeout(function () {
              c.animate({ width: e, opacity: "1.0" }, d.animSpeed, "", function () {
                b.trigger("nivo:animFinished");
              });
            }, 100 + k);
          } else {
            setTimeout(function () {
              c.animate({ width: e, opacity: "1.0" }, d.animSpeed);
            }, 100 + k);
          }k += 50;l++;
        });
      } else if (g === "fade") {
        m(b, d, f);q = a(".nivo-slice:first", b);q.css({ width: b.width() + "px" });q.animate({ opacity: "1.0" }, d.animSpeed * 2, "", function () {
          b.trigger("nivo:animFinished");
        });
      } else if (g === "slideInRight") {
        m(b, d, f);q = a(".nivo-slice:first", b);q.css({ width: "0px", opacity: "1" });q.animate({ width: b.width() + "px" }, d.animSpeed * 2, "", function () {
          b.trigger("nivo:animFinished");
        });
      } else if (g === "slideInLeft") {
        m(b, d, f);q = a(".nivo-slice:first", b);q.css({ width: "0px", opacity: "1", left: "", right: "0px" });q.animate({ width: b.width() + "px" }, d.animSpeed * 2, "", function () {
          q.css({ left: "0px", right: "" });b.trigger("nivo:animFinished");
        });
      } else if (g === "boxRandom") {
        n(b, d, f);r = d.boxCols * d.boxRows;l = 0;k = 0;s = p(a(".nivo-box", b));s.each(function () {
          var c = a(this);if (l === r - 1) {
            setTimeout(function () {
              c.animate({ opacity: "1" }, d.animSpeed, "", function () {
                b.trigger("nivo:animFinished");
              });
            }, 100 + k);
          } else {
            setTimeout(function () {
              c.animate({ opacity: "1" }, d.animSpeed);
            }, 100 + k);
          }k += 20;l++;
        });
      } else if (g === "boxRain" || g === "boxRainReverse" || g === "boxRainGrow" || g === "boxRainGrowReverse") {
        n(b, d, f);r = d.boxCols * d.boxRows;l = 0;k = 0;var u = 0;var v = 0;var w = [];w[u] = [];s = a(".nivo-box", b);if (g === "boxRainReverse" || g === "boxRainGrowReverse") {
          s = a(".nivo-box", b)._reverse();
        }s.each(function () {
          w[u][v] = a(this);v++;if (v === d.boxCols) {
            u++;v = 0;w[u] = [];
          }
        });for (var x = 0; x < d.boxCols * 2; x++) {
          var y = x;for (var z = 0; z < d.boxRows; z++) {
            if (y >= 0 && y < d.boxCols) {
              (function (c, e, f, h, i) {
                var j = a(w[c][e]);var k = j.width();var l = j.height();if (g === "boxRainGrow" || g === "boxRainGrowReverse") {
                  j.width(0).height(0);
                }if (h === i - 1) {
                  setTimeout(function () {
                    j.animate({ opacity: "1", width: k, height: l }, d.animSpeed / 1.3, "", function () {
                      b.trigger("nivo:animFinished");
                    });
                  }, 100 + f);
                } else {
                  setTimeout(function () {
                    j.animate({ opacity: "1", width: k, height: l }, d.animSpeed / 1.3);
                  }, 100 + f);
                }
              })(z, y, k, l, r);l++;
            }y--;
          }k += 100;
        }
      }
    };var p = function p(a) {
      for (var b, c, d = a.length; d; b = parseInt(Math.random() * d, 10), c = a[--d], a[d] = a[b], a[b] = c) {}return a;
    };var q = function q(a) {
      if (this.console && typeof console.log !== "undefined") {
        console.log(a);
      }
    };this.stop = function () {
      if (!a(_b).data("nivo:vars").stop) {
        a(_b).data("nivo:vars").stop = true;q("Stop Slider");
      }
    };this.start = function () {
      if (a(_b).data("nivo:vars").stop) {
        a(_b).data("nivo:vars").stop = false;q("Start Slider");
      }
    };d.afterLoad.call(this);return this;
  };a.fn.nivoSlider = function (c) {
    return this.each(function (d, e) {
      var f = a(this);if (f.data("nivoslider")) {
        return f.data("nivoslider");
      }var g = new b(this, c);f.data("nivoslider", g);
    });
  };a.fn.nivoSlider.defaults = { effect: "random", slices: 15, boxCols: 8, boxRows: 4, animSpeed: 500, pauseTime: 3e3, startSlide: 0, directionNav: true, controlNav: true, controlNavThumbs: false, pauseOnHover: true, manualAdvance: false, prevText: "", nextText: "", randomStart: false, beforeChange: function beforeChange() {}, afterChange: function afterChange() {}, slideshowEnd: function slideshowEnd() {}, lastSlide: function lastSlide() {}, afterLoad: function afterLoad() {} };a.fn._reverse = [].reverse;
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/scripts.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__("./node_modules/jquery/dist/jquery.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


var app = {};
window.$ = __WEBPACK_IMPORTED_MODULE_0_jquery___default.a;

__webpack_require__("./resources/assets/js/nivo-slider.js");
__webpack_require__("./resources/assets/js/jq_easing.1.3.js");
__webpack_require__("./resources/assets/js/totop.js");
__webpack_require__("./resources/assets/js/js_top.js");

__WEBPACK_IMPORTED_MODULE_0_jquery___default()('document').ready(function () {
    __WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': __WEBPACK_IMPORTED_MODULE_0_jquery___default()('meta[name="csrf-token"]').attr('content') }
    });
});

app.Base = function () {

    var init = function init() {
        //  toTop();
    };

    return {
        init: init
    };
}();

__WEBPACK_IMPORTED_MODULE_0_jquery___default()(document).ready(function () {
    app.Base.init();
});

/***/ }),

/***/ "./resources/assets/js/totop.js":
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
	$.fn.UItoTop = function (options) {

		var defaults = {
			text: '',
			min: 500,
			scrollSpeed: 800,
			containerID: 'toTop',
			containerClass: 'toTop fa fa-angle-up',
			easingType: 'linear'

		};

		var settings = $.extend(defaults, options);
		var containerIDhash = '#' + settings.containerID;
		var containerHoverIDHash = '#' + settings.containerHoverID;

		$('body').append('<a href="#" id="' + settings.containerID + '" class="' + settings.containerClass + '" >' + settings.text + '</a>');

		$(containerIDhash).hide().click(function () {
			$('html, body').stop().animate({ scrollTop: 0 }, settings.scrollSpeed, settings.easingType);
			$('#' + settings.containerHoverID, this).stop().animate({ 'opacity': 0 }, settings.inDelay, settings.easingType);
			return false;
		});

		$(window).scroll(function () {
			var sd = $(window).scrollTop();
			if (typeof document.body.style.maxHeight === "undefined") {
				$(containerIDhash).css({
					'position': 'absolute',
					'top': $(window).scrollTop() + $(window).height() - 50
				});
			}
			if (sd > settings.min) $(containerIDhash).stop(true, true).fadeIn(600);else $(containerIDhash).fadeOut(800);
		});
	};
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/sass/admin.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/sass/app.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/sass/extras.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("./resources/assets/js/scripts.js");
__webpack_require__("./resources/assets/sass/app.scss");
__webpack_require__("./resources/assets/sass/admin.scss");
module.exports = __webpack_require__("./resources/assets/sass/extras.scss");


/***/ })

},[0]);