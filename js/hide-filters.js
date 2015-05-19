// Hide/show filters
jQuery(document).ready(function($){

    $("a#show-filters").click(function(){
        $(".movie-filter").slideToggle('slow');
        return false;
    });
    $("a#close-filters").click(function(){
        $(".movie-filter").slideToggle('slow');
        return false;
    });

});