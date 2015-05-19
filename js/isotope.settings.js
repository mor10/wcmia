// Isotope settings
jQuery(document).ready(function ($) {

    // Clear all checkboxes
    $('a.view-all').click(function () {
        $('.option-set input:checked').removeAttr('checked');
        var clear = '*';
        $container.isotope({ filter: clear });
        $('.option-set li:has(input:checkbox:not(:checked))').removeClass('active');
        return false;
    });
    
    // Set up key variables
    var $container = $('.movie-index'); // The container that holds all the isotope items
    var $checkboxes = $('.movie-filter input'); // All the individual filter buttons

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

    // Filtering section: This function grabs all selected boxes and combines them into an annd filter
    $checkboxes.change(function () {
        var $filters = [];
        // get checked checkboxes values
        $checkboxes.filter(':checked').each(function () {
            $filters.push(this.value);
        });
        // ['.red', '.blue'] -> '.red, .blue'
        $filters = $filters.join('');
        console.log($filters);
        $container.isotope({ filter: $filters });
    }); 
    
});