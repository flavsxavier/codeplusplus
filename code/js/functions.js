$(document).ready(function(){
    // Sidenav
    $('.sidenav').sidenav();
    // Tabs
    $('.tabs').tabs();
    // Slider
    $('.slider').slider();
    // ScrollSpy
    $(document).on("scroll", onScroll);
    // Smoothscroll
    $('#nav-top li a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('a').each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 30
        }, 500, 'swing', function () {
            window.location.hash = target - 30;
            $(document).on("scroll", onScroll);
        });
    });
    // smoothscroll mobile
    $('#nav-mobile li a.nav-mobile-item[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('a').each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 30
        }, 500, 'swing', function () {
            window.location.hash = target - 30;
            $(document).on("scroll", onScroll);
        });
    });
    // Input Counter
    $('input#iNome, textarea#iTexto').characterCounter();
    // Select
    $('select').formSelect();
    // Modal
    $('#contato-modal').modal();
    $('#contato-modal').modal('open');
    $(".contato-modal-close").click(function() {
        setTimeout(function() {location.href = "../index.html"}, 0);
    });
});
// ScrollSpy (cont.)
function onScroll(event){
    var scrollPos = $(document).scrollTop() + 35;
    $('#nav-top li a.nav-item').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('#nav-top li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}