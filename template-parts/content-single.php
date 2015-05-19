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
					<h1 class="entry-title">
					  	<?php the_title(); ?> 
			            <span class="creator">by 
			                <?php the_field('first_name'); ?> <?php the_field('last_name'); ?>
			            </span>
		        	</h1>

					<div class="entry-meta">
						<span class="time">
			            	<?php
							$terms = get_the_terms( $post->ID, 'durations' );
													
							if ( $terms && ! is_wp_error( $terms ) ) : 

								$durations_array = array();
								foreach ( $terms as $term ) {
									$durations_array[] = $term->name;
								}
								$durations = join( ", ", $durations_array );
								
								echo $durations; 

							endif; 
							?>
			            </span> | 
			            <span class="genre">
			                <?php
							$terms = get_the_terms( $post->ID, 'genres' );
													
							if ( $terms && ! is_wp_error( $terms ) ) : 
								$genres_array = array();
								foreach ( $terms as $term ) {
									$genres_array[] = $term->name;
								}														
								$genres = join( ", ", $genres_array );
								
								echo $genres; 

							endif; 
							?>
			       		 </span>
					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			</div><!-- .movie-info -->

		</div><!-- .centered -->
	</div><!-- .info-wrapper -->

</article><!-- #post-## -->
