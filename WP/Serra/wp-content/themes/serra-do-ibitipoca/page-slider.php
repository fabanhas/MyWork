<?php
/* Template Name: Modelo Slider */

get_header(); ?>

<div class="wrap">
	<?php 
		if( have_posts() ) :
			while( have_posts() ) : the_post();
	?>
		<section class="content">
			<div class="left">
				<?php 
					if( get_field('shortcode') ) {
						echo do_shortcode(get_field('shortcode'));
					} else {
						if( get_the_post_thumbnail_url() ) {
							echo '<img src="'. get_the_post_thumbnail_url() .'">';
						} else {
							echo '<img src="'. get_template_directory_uri() .'/img/interna.jpg">';
						}
					}
				?>
			</div>
			<div class="right">
				<?php 
					echo '<h1>'. get_the_title() .'</h1>';
					the_content();
				?>
			</div>
		</section>
	<?php
			endwhile;
		endif;
	?>
</div>

<?php
get_footer();
