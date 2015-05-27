// Custom settings for video player
jQuery(document).ready(function ($) {
	
	// Fullscreen when video plays
	$('.wp-video-shortcode').on("play", function() {
	    this.player.enterFullScreen();
	});

	// Exit fullscreen when video pauses
	$('.wp-video-shortcode').on("pause", function() {
	    this.player.exitFullScreen();
	});

	// Control for switching movie source
	$('.control a').click(function(){
        // Get current video element
        var $current_url = $('.wp-video-shortcode').attr( "src" );
        // Get video element called by click
        var $url = $( this ).attr( 'data-bind' );
        // Only switch video element source if the URL is different
        // This preserves the player location between pause and play states
        if ( $url != $current_url) { 
            $('.wp-video-shortcode').attr( "src", $url );
            $('.wp-video-shortcode source').attr( "src", $url );
        }
        return false;
    });

	// Play the movie when the user chooses an option
    $('.wp-video-shortcode').on("canplay", function(){
    	var $player = this.player;
        $('.control a').click(function(){
            $player.play();
        });
    });
});