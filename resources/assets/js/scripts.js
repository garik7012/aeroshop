import $ from 'jquery';

const app = {};
window.$ = $;

require('./nivo-slider.js');
require('./jq_easing.1.3.js');
require('./totop');
require('./js_top');
require('./libs/matchHeight.js');

$('document').ready(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
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