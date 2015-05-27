<?php
/**
 * Template Name: Student Index
 *
 * The template for displaying the Students
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h1 class="students-header">Students</h1>

			<section class="student-index">

				<?php
				// Set up query arguments to find all posts
				// and order them based on the last name
				$args = array(
					'post_type'		=> 'post',
					'posts_per_page'	=> -1,
					'meta_key'		=> 'last_name',
					'orderby'		=> 'meta_value',
					'order'			=> 'ASC'
				);

				// Make query based on the arguments defined above
				$wp_query = new WP_Query( $args );

				// Set $previous to null before starting to track alphabet letters
				$previous = null;

				// Run the loop with our custom query
				while( $wp_query->have_posts() ): $wp_query->the_post(); 
					echo '<div class="student">';

					// Get the last name of the current student
					$last_name = get_field('last_name');
					// Get the first letter of last name
					$first_letter = substr($last_name, 0, 1);
					// If the previous stored first letter does not match above,
					// add new alphabetical letter.
				    if ( $previous !== $first_letter ) {
				    	echo '<div class="alphabet">' . $first_letter . '</div>';
				    }
				    // Set $previous to $first_letter to run the test again
				    $previous = $first_letter;

				    // Output student photo and name
					get_template_part( 'template-parts/content', 'student' ); 

					echo '</div><!-- .student -->';

				endwhile; // end of the loop. 

				?>
			</section><!-- .student-index -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
