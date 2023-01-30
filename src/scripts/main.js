'use strict'
var $ = require('jquery');

let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);

window.addEventListener('resize', () => {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
});
$(document).ready(function () {
    const slides = document.querySelectorAll(".slide");
    const nextButton = document.getElementById("next");
    const prevButton = document.getElementById("prev");
    const auto = true;
    const intervalTime = 5000;
    let slideInterval;


    const nextSlide = () => {
        const current = document.querySelector(".current");
        current.classList.remove("current");
        if (current.nextElementSibling) {
            current.nextElementSibling.classList.add("current");
        } else {
            slides[0].classList.add("current");
        }
    };

    const prevSlide = () => {
        const current = document.querySelector(".current");
        current.classList.remove("current");
        if (current.previousElementSibling) {
            current.previousElementSibling.classList.add("current");
        } else {
            slides[slides.length - 1].classList.add("current");
        }
    };

    nextButton.addEventListener("click", () => {
        nextSlide();
        if (auto) {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, intervalTime);
        }
    });
    prevButton.addEventListener("click", () => {
        prevSlide();
        if (auto) {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, intervalTime);
        }
    });

    if (auto) {
        slideInterval = setInterval(nextSlide, intervalTime);
    }

    var ppp1 = 6; // Post per page
    var pageNumber1 = 1;


    function load_posts() {
        pageNumber1++;
        var str = '&pageNumber=' + pageNumber1 + '&ppp=' + ppp1 + '&action=more_post_ajax';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: str,
            success: function (data) {
                var $data = $(data);
                if ($data.length) {
                    $(".ajax-posts-services").append($data);
                    //$("#more_posts").attr("disabled",false); // Uncomment this if you want to disable the button once all posts are loaded
                    $("#more_posts").hide(); // This will hide the button once all posts have been loaded
                } else {
                    $("#more_posts").attr("disabled", true);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }

    $("#more_posts").on("click", function () { // When btn is pressed.
        $("#more_posts").attr("disabled", true); // Disable the button, temp.
        load_posts();
        // $(this).insertAfter('.ajax-posts-services'); // Move the 'Load More' button to the end of the the newly added posts.
    });

    var ppp = 4; // Post per page
    var pageNumber = 1;


    function load_posts_portfolio() {
        pageNumber++;
        var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax_portfolio';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: str,
            success: function (data) {
                var $data = $(data);
                if ($data.length) {
                    $(".ajax-posts-portfolios").append($data);
                    // $("#more_posts_portfolio").attr("disabled",false); // Uncomment this if you want to disable the button once all posts are loaded
                    $("#more_posts_portfolio").hide(); // This will hide the button once all posts have been loaded
                } else {
                    $("#more_posts_portfolio").attr("disabled", true);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }

    $("#more_posts_portfolio").on("click", function () { // When btn is pressed.
        $("#more_posts_portfolio").attr("disabled", true); // Disable the button, temp.
        load_posts_portfolio();
        // $(this).insertAfter('.ajax-posts-portfolios'); // Move the 'Load More' button to the end of the the newly added posts.
    });
});


//testimonialsonials
// vars

const el = document.getElementById('testimonials-dots');
console.log(el);
var testimonials = document.getElementById("testimonials"),
    testimonialsDots = Array.prototype.slice.call(document.getElementById("testimonials-dots").children),
    testimonialsContent = Array.prototype.slice.call(document.getElementById("testimonials-content").children),
    testimonialsLeftArrow = document.getElementById("left-arrow"),
    testimonialsRightArrow = document.getElementById("right-arrow"),
    testimonialsSpeed = 4500,
    currentSlide = 0,
    currentActive = 0,
    testimonialsTimer,
    touchStartPos,
    touchEndPos,
    touchPosDiff,
    ignoreTouch = 30;
;

window.onload = function () {

    // testimonials Script
    function playSlide(slide) {
        for (var k = 0; k < testimonialsDots.length; k++) {
            testimonialsContent[k].classList.remove("active");
            testimonialsContent[k].classList.remove("inactive");
            testimonialsDots[k].classList.remove("active");
        }

        if (slide < 0) {
            slide = currentSlide = testimonialsContent.length - 1;
        }

        if (slide > testimonialsContent.length - 1) {
            slide = currentSlide = 0;
        }

        if (currentActive != currentSlide) {
            testimonialsContent[currentActive].classList.add("inactive");
        }
        testimonialsContent[slide].classList.add("active");
        testimonialsDots[slide].classList.add("active");

        currentActive = currentSlide;

        clearTimeout(testimonialsTimer);
        testimonialsTimer = setTimeout(function () {
            playSlide(currentSlide += 1);
        }, testimonialsSpeed)
    }

    testimonialsLeftArrow.addEventListener("click", function () {
        playSlide(currentSlide -= 1);
    })

    testimonialsRightArrow.addEventListener("click", function () {
        playSlide(currentSlide += 1);
    })

    for (var l = 0; l < testimonialsDots.length; l++) {
        testimonialsDots[l].addEventListener("click", function () {
            playSlide(currentSlide = testimonialsDots.indexOf(this));
        })
    }

    playSlide(currentSlide);

    // keyboard shortcuts
    document.addEventListener("keyup", function (e) {
        switch (e.keyCode) {
            case 37:
                testimonialsLeftArrow.click();
                break;

            case 39:
                testimonialsRightArrow.click();
                break;

            case 39:
                testimonialsRightArrow.click();
                break;

            default:
                break;
        }
    })

    testimonials.addEventListener("touchstart", function (e) {
        touchStartPos = e.changedTouches[0].clientX;
    })

    testimonials.addEventListener("touchend", function (e) {
        touchEndPos = e.changedTouches[0].clientX;

        touchPosDiff = touchStartPos - touchEndPos;

        console.log(touchPosDiff);
        console.log(touchStartPos);
        console.log(touchEndPos);


        if (touchPosDiff > 0 + ignoreTouch) {
            testimonialsLeftArrow.click();
        } else if (touchPosDiff < 0 - ignoreTouch) {
            testimonialsRightArrow.click();
        } else {
            return;
        }

    })
}