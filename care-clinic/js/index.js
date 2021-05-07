$(function () {


    //* HIDING THE REGISTER WHEN LOGIN OPEN & VISA VERSA

    $(".register-form").hide();

    $('.sign-up').on("click", function () {
        $(".login-form").hide();
        $(".register-form").fadeIn();
    });

    $('.sign-in').on("click", function () {
        $(".login-form").fadeIn();
        $(".register-form").hide();
    });

});
