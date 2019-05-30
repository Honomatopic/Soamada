$(document).ready(function () {
    $(".onscrollbutton").hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 650) {
            $('.onscrollbutton').fadeIn(300);
        } else {
            $('.onscrollbutton').fadeOut(300);
        }
    });
}); 