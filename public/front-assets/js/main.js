$(document).ready(function () {
    var headerHeight = $("header").height() + "px";

    //   used when header with padding in top and bottom
    // var headerHeight = $('.header-section ').outerHeight() + 'px';

    //   used when header with padding in top and bottom
    // var headerHeight = $('.header-section ').innerHeight() + 'px';

    $("body").css("margin-top", headerHeight);
});

$("select").on("change", function () {
    if ($(this).val()) {
        return $(this).css("color", "#333333");
    } else {
        return $(this).css("color", "#A3A3A3");
    }
});

// services slider
$("#ser-slide").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    margin: 10,
    dots: true,
    items: 5,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        576: {
            items: 1,
            nav: false,
        },
        768: {
            items: 2,
            nav: false,
        },
        992: {
            items: 3,
            nav: false,
        },
    },
});
// client logo slider
$("#client").owlCarousel({
    loop: true,
    autoplay: false,
    autoplayTimeout: 5000,
    margin: 10,
    dots: false,
    items: 5,
    responsiveClass: true,
    responsive: {
        0: {
            items: 2,
            nav: false,
        },
        576: {
            items: 2,
            nav: false,
        },
        767: {
            items: 3,
            nav: false,
        },
        1000: {
            items: 5,
            nav: false,
            loop: false,
        },
    },
});

// banner  slider
$("#banner-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoHeight: true,
    autoplayTimeout: 6000,
    margin: 30,
    fade: true,
    dots: true,
    nav: false,
    items: 1,
});

// testimonial  slider
$("#owl-carousel").owlCarousel({
    loop: true,
    margin: 30,
    autoplay: true,
    autoplayTimeout: 3000,
    dots: true,
    nav: true,
    items: 1,
});
// counter home page

// document.addEventListener("DOMContentLoaded", () => {
// function counter(id, start, end, duration) {
// let obj = document.getElementById(id),
// current = start,
// range = end - start,
// increment = end > start ? 1 : -1,
// step = Math.abs(Math.floor(duration / range)),
// timer = setInterval(() => {
// current += increment;
// obj.textContent = current + '+';
// if (current == end) {
// clearInterval(timer);
// }
// }, step);
// }

// function counter1(id, start, end, duration) {
// let obj = document.getElementById(id),
// current = start,
// range = end - start,
// increment = end > start ? 1 : -1,
// step = Math.abs(Math.floor(duration / range)),
// timer = setInterval(() => {
// current += increment;
// obj.textContent = current;
// if (current == end) {
// clearInterval(timer);
// }
// }, step);
// }

// counter("count1", 0, 300, 2000);
// counter1("count2", 0, 4, 8);
// counter1("count3", 0, 85, 1000);
// counter("count4", 0, 200, 2000);

// });

var btn = $("#back-button");
$(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
        btn.addClass("show");
    } else {
        btn.removeClass("show");
    }
});
btn.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "300");
});

/*----------------- scoll to top js start ---------------*/
$(window)
    .resize(function () {
        var height = $("#main-header").height();
        $("#content").css({
            "margin-top": height,
        });
    })
    .trigger("resize");

$("form#contact-form").submit(function (event) {
    event.preventDefault();
    //$("form#contact-form").validate();
    var formData = $("form#contact-form").serialize();
    $.ajax({
        type: "POST",
        url: "process.php",
        data: formData,
        dataType: "json",
        encode: true,
    }).done(function (data) {
        console.log(data);
        $(".Inquiremessage").html(data.message);
        //$("form#contact-form input").val('');
        $(".Inquiremessage").addClass("status" + data.status);
        if (data.status == 200) {
            $("input").val("");
            $("textarea").val("");
        }
    });
});

$("form#contact-form_2").submit(function (event) {
    event.preventDefault();
    var formData = $("form#contact-form_2").serialize();
    $.ajax({
        type: "POST",
        url: "process2.php",
        data: formData,
        dataType: "json",
        encode: true,
    }).done(function (data) {
        console.log(data);
        $(".Inquiremessage_2").html(data.message);
        //$("form#contact-form_2 input").val('');
        $(".Inquiremessage_2").addClass("status" + data.status);
        if (data.status == 200) {
            $("input").val("");
            $("textarea").val("");
        }
    });
});

$("#menu_2 > a").click(function () {
    $("ul.sub-menu").not($(this).siblings()).slideUp();
    $(this).siblings("ul.sub-menu").slideToggle();
});
$("#menu_3 > a").click(function () {
    $("ul.sub-menu").not($(this).siblings()).slideUp();
    $(this).siblings("ul.sub-menu").slideToggle();
});

AOS.init({ duration: 1200 });

var input = document.querySelector("#phone_number"),
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = [
    "Invalid number",
    "Invalid country code",
    "Too short",
    "Too long",
    "Invalid number",
];
/* Whatsapp Chat Widget by www.idblanter.com */
$(document).on("click", "#send-it", function () {
    var a = document.getElementById("chat-input");
    if ("" != a.value) {
        var b = $("#get-number").text(),
            c = document.getElementById("chat-input").value,
            d = "https://web.whatsapp.com/send",
            e = b,
            f = "&text=" + c;
        if (
            /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                navigator.userAgent
            )
        )
            var d = "whatsapp://send";
        var g = d + "?phone=" + e + f;
        window.open(g, "_blank");
    }
}),
    $(document).on("click", ".informasi", function () {
        (document.getElementById("get-number").innerHTML = $(this)
            .children(".my-number")
            .text()),
            $(".start-chat,.get-new").addClass("show").removeClass("hide"),
            $(".home-chat,.head-home").addClass("hide").removeClass("show"),
            (document.getElementById("get-nama").innerHTML = $(this)
                .children(".info-chat")
                .children(".chat-nama")
                .text()),
            (document.getElementById("get-label").innerHTML = $(this)
                .children(".info-chat")
                .children(".chat-label")
                .text());
    }),
    $(document).on("click", ".close-chat", function () {
        $("#whatsapp-chat").addClass("hide").removeClass("show");
    }),
    $(document).on("click", ".blantershow-chat", function () {
        $("#whatsapp-chat").addClass("show").removeClass("hide");
    });
