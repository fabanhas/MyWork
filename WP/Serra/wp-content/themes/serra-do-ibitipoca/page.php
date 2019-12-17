<?php
get_header(); ?>

<div class="wrap">
	<?php 
		if( have_posts() ) :
			while( have_posts() ) : the_post();
	?>
		<section class="content">
			<div class="content-wrap">
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