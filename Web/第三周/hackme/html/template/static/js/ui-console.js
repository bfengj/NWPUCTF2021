$(document).ready(() => {
    $(window).scroll(() => {
        if ($(window).scrollTop() > 0) $("nav").addClass("on-top");
        else $("nav").removeClass("on-top");
    });
});