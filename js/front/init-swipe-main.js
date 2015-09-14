$(window).ready(function() {
		
        window.mySwipe = new Swipe(document.getElementById('slideshow'), {
                startSlide: 0,
                speed: 600,
                auto: 4000,
                continuous: true,
                disableScroll: false,
                stopPropagation: false,
                callback: function(index, elem) {},
                transitionEnd: function(index, elem) {}
              });
});