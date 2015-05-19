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


     // Control the filter through a URL variable
    $(window).bind( 'hashchange', function( event ){
        // get options object from hash
        var hashOptions = $.deparam.querystring();
        
        // apply options from hash
        $container.isotope( hashOptions );
        
        // Highlighting
        var justHash = $.param.querystring();
        
        justHash = justHash.replace("filter=","");
        console.log(justHash);

        if(justHash === '') { 
            return; 
        }; 

        // Check for URL variable and check correct checkbox if it's there.
        if(justHash === '.fvim') {
            $('#fvim').prop('checked', true); 
        };
        if(justHash === '.anim') {
            $('#anim').prop('checked', true); 
        };


    })

    // trigger hashchange to capture any hash data on init
    .trigger('hashchange');
    
});