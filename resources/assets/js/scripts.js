import $ from 'jquery';

const app = {};
window.$ = $;

require('./nivo-slider.js');
require('./libs/jq_easing.1.3.js');
require('./totop');
require('./js_top');
require('./libs/matchHeight.js');
require('fancybox/dist/js/jquery.fancybox.pack.js');

$('document').ready(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
});


$(document).ready(function() {
    $("#productAdditionalImages .additionalImages a img").click(function () {
        $("#productMainImage span img").attr('src', this.src);
        $("#productMainImage a").attr('src', this.src);
        return false;
    });
    $('a[rel=group1]').fancybox({
        'transitionIn'	:	'elastic',
        'transitionOut'	:	'elastic',
        'speedIn'		:	600,
        'speedOut'		:	200,
        'overlayShow'	:	false
    });
});


app.Base = (function () {

    const init = function () {
      //  toTop();
    };

    return {
        init: init
    }
}());

$(document).ready(function () {
    app.Base.init();
});