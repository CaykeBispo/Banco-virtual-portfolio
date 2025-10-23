$(document).ready(function() {

    $('#carousel').flexslider({
        animation: "slide",
        // controlNav: false,
        animationLoop: false,
        directionNav: false,
        slideshow: true,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
    });

    $('#slider').flexslider({
        animation: "fade",
        slideshowSpeed: 4000,
        animationSpeed: 1000,
        // controlNav: false,
        animationLoop: true,
        directionNav: false,
        slideshow: true,
        sync: "#carousel",
        slideshowSpeed: 10500,
        start: function (flexslider) {
            changeTimer(flexslider);
        },
        after: function (flexslider) {
            changeTimer(flexslider);
        }
    });

    function changeTimer(flexslider) {
        $(".progress-bar").addClass("no-active");
        $(".bar_" + flexslider.currentSlide).removeClass("no-active");
        $(".no-active").children("div").remove();
        $(".bar_" + flexslider.currentSlide + ".flex-active-slide").loading();
    }

    $('.progress-bar').on('click', function () {
        $('.flexslider').flexslider(parseInt($(this).attr('data-slide')));
        $('.flexslider').flexslider("play");
    });

    // Inseri o texto no banner dinanmicamente
    var textBanner = document.querySelectorAll(".text__banner");

    for (var i = 0; i < textBanner.length; i++) {

        var e = textBanner[i];

        for (var j = 0; j < e.childElementCount; j++) {

            var title = e.children[j];
            if (title.classList.contains("title")) title.innerHTML = e.children[j].getAttribute('data-title');

            var descri_one = e.children[j];
            if (descri_one.classList.contains("descri_one")) descri_one.innerHTML = e.children[j].getAttribute('data-one');

            var descri_two = e.children[j];
            if (descri_two.classList.contains("descri_two")) descri_two.innerHTML = e.children[j].getAttribute('data-two');

            var button = e.children[j];
            if (button.classList.contains("button")) button.innerHTML = e.children[j].getAttribute('data-button');

        }

    }

});