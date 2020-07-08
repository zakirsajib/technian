$ = jQuery.noConflict();
$(function ($) {
    "use strict";

    $(".header-button").on("click",function () {
        $(".contents").toggleClass("nav-slide");
    });
});
