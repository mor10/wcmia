<?php
/**
 * @package wcmia
 */
?>

<article id="post-<?php the_ID(); ?>" class="movie-item <?php echo wcmia_create_tax_classes(); ?>">

	<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<?php 
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
            the_post_thumbnail('mod-poster');
        } else {
            echo '<img src="' . get_template_directory_uri() . '/images/poster-dummy.png">';
        }
        ?>
	
		<div class="infocontainer">
	        <h2><?php the_title(); ?></h2> 
	        <div class="artistname">
	            <span>by</span> <?php the_field('first_name'); ?> <?php the_field('last_name'); ?>
	        </div><!-- .artistname -->
	        <div class="info-meta">
	            <span class="time">
	                <?php echo strip_tags( get_the_term_list( $post->ID, 'durations', '', ', ' ) ); ?>
	            </span> | 
	            <span class="major">
	                <?php echo strip_tags( get_the_category_list( ', ') ); ?>
	            </span> | 
	            <span class="genre">
	                <?php echo strip_tags( get_the_term_list( $post->ID, 'genres', '', ', ' ) ); ?>
	             </span>
	        </div><!-- .info-meta -->
	    </div><!-- .infocontainer -->
    </a>

</article><!-- #post-## -->