$(document).ready(function () {

    var slides = document.querySelectorAll('#slides .slide');
    var currentSlide = 0;
    var slideInterval = setInterval(nextSlide, 60000);

    function nextSlide() {
        slides[currentSlide].className = 'slide';
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].className = 'slide showing';
    }

    function previewSlide() {
        slides[currentSlide].className = 'slide';
        currentSlide = Math.abs(currentSlide - 1) % slides.length;
        slides[currentSlide].className = 'slide showing';
    }

    $('.nex').click(function (e) {
        nextSlide();
    });

    $('.pre').click(function (e) {
        previewSlide();
    });
});