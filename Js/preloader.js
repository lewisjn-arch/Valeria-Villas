document.addEventListener('DOMContentLoaded', function() {
    var preloader = document.getElementById('preloader');
    var preloaderBg = document.querySelector('.preloader-bg');
    var images = document.querySelectorAll('img');

    imagesLoaded(images, function() {
        // Hide preloader once images are loaded
        preloader.style.display = 'none';
        preloaderBg.style.display = 'none';
    });
});