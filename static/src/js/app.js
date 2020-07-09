$ = jQuery.noConflict();
$(function ($) {
    "use strict";

    $(".header-button").on("click",function () {
        $(".contents").toggleClass("nav-slide");
        $(".styles__Burger").toggleClass("close");
        $(".styles__Nav").toggleClass("nav-open");
        $(".styles__Logo").toggleClass("biggerLogo");
    });

    $( "body #page header#masthead .styles__Nav ul li.capabilities a" )
        .mouseenter(function() {
            $('body #page .menu-expand .menu1').fadeIn( 550 );
        })
        .mouseleave(function() {
            $('body #page .menu-expand .menu1').fadeOut( 500 );
        });
    $( "body #page header#masthead .styles__Nav ul li.about a" )
        .mouseenter(function() {
            $('body #page .menu-expand .menu2').fadeIn( 500 );
        })
        .mouseleave(function() {
            $('body #page .menu-expand .menu2').fadeOut( 500 );
        });
    $( "body #page header#masthead .styles__Nav ul li.work a" )
        .mouseenter(function() {
            $('body #page .menu-expand .menu3').fadeIn( 500 );
        })
        .mouseleave(function() {
            $('body #page .menu-expand .menu3').fadeOut( 500 );
        });
    $( "body #page header#masthead .styles__Nav ul li.resource a" )
        .mouseenter(function() {
            $('body #page .menu-expand .menu4').fadeIn( 500 );
        })
        .mouseleave(function() {
            $('body #page .menu-expand .menu4').fadeOut( 500 );
        });

    $( "body #page header#masthead .styles__Nav ul li.award a" )
        .mouseenter(function() {
            $('body #page .menu-expand .menu5').fadeIn( 500 );
        })
        .mouseleave(function() {
            $('body #page .menu-expand .menu5').fadeOut( 500 );
        });

    $( "body #page header#masthead .styles__Nav ul li.blog a" )
        .mouseenter(function() {
            $('body #page .menu-expand .menu6').fadeIn( 500 );
        })
        .mouseleave(function() {
            $('body #page .menu-expand .menu6').fadeOut( 500 );
        });
    $( "body #page header#masthead .styles__Nav ul li.contact a" )
        .mouseenter(function() {
            $('body #page .menu-expand .menu7').fadeIn( 500 );
        })
        .mouseleave(function() {
            $('body #page .menu-expand .menu7').fadeOut( 500 );
        });
});
