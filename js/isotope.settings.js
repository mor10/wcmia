// Isotope settings
jQuery(document).ready(function ($) {

    // Set up key variables
    var $container = $('.movie-index'); // The container that holds all the isotope items

    // Initiate Isotope
    $container.isotope({
        // Find items to be organized
        itemSelector: '.movie-item',
        // Set type of layout, and gutter between items
        masonry: {
              gutter: 36
       }
    });
    
    // Layout Isotope again after all images have loaded
    $container.imagesLoaded( function() {
        $container.isotope('layout');
    });
    
});