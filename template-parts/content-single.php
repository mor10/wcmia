<?php
/**
 * @package wcmia
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="movie-wrapper">
		<div class="the-movie embed-container" >			
			<?php 
				$video_url = get_field('video_url');
				$attr = array(
					'poster'	=> esc_url( get_site_url() . '/video/Posters/' . $video_url . '_p.jpg' ),
					'src'		=> esc_url( get_site_url() . '/video/Films/' . $video_url . '.mp4' ),
					'width'		=> '',
					'fullscreen'=> 'true'
				);
				echo wp_video_shortcode( $attr );
			?>
			<div class="control">
				<a href="#" class="movie-trigger">Play Trailer</a> 
				<a href="#" class="movie-trigger">Play Movie</a>
			</div><!-- .control -->
		</div><!-- .embed-container -->
	</div><!-- .movie-wrapper -->

	<div class="info-wrapper">
		<div class="centered">

			<div class="movie-poster">
				<?php
				// check if post has as post thumbail assigned to it
					if ( has_post_thumbnail() ) {
						echo '<figure class="poster">';
						the_post_thumbnail('mod-poster');
						echo '</figure>';
					}
				?>
			</div><!-- .movie-poster -->

			<div class="movie-info">

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

					<div class="entry-meta">
						<?php wcmia_posted_on(); ?>
					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			</div><!-- .movie-info -->

		</div><!-- .centered -->
	</div><!-- .info-wrapper -->

</article><!-- #post-## -->
