$ = jQuery.noConflict();
$(function ($) {
    "use strict";

    $(".header-button").on("click",function () {
        $(".contents").toggleClass("nav-slide");
        $(".styles__Burger").toggleClass("close");
        $(".styles__Nav").toggleClass("nav-open");
    });
});
