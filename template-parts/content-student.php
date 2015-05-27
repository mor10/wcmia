<?php
/*
 * Display each student with headshot and full name
 */
?>


	<a href="<?php echo esc_url( get_permalink() ); ?>">
		<div class="student-headshot">
			<?php 

			$image = get_field('profile_picture');
			$first_name = get_field('first_name');
			$last_name = get_field('last_name');

			if( !empty($image) ){ ?>

				<img src="<?php echo $image['sizes']['student-head']; ?>" alt="" >

			<?php } else { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/default-avatar-160.png" alt="" >
			<?php } ?>
		</div><!-- .student-headshot -->
		<h3 class="student-name">
			<?php 
				if (!empty($first_name)) { echo $first_name; } 
				else { echo 'Firstname'; } 
				echo ' ';
				if (!empty($last_name)) { echo $last_name; } 
				else { echo 'Lastname'; } 
			?>
		</h3>
	</a>
