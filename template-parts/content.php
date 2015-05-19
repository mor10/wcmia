<?php
/**
 * @package wcmia
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<?php 
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
            the_post_thumbnail('mod-poster');
        } else {
            echo '<img src="' . get_template_directory_uri() . '/images/poster-dummy.png">';
        }
        ?>
	</a>

</article><!-- #post-## -->