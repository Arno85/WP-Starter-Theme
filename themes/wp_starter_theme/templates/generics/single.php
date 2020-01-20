<?php
/**
 * The template for displaying all single posts
 * @author Arnaud Martin
 */
?>

<section class="container">

<?php if (have_posts()) : 
    while (have_posts()) : the_post(); ?>

		<div class="page-header">
			<h1 class="page-title"><?= the_title(); ?></h1>
		</div> 

		<div class="page-content">
			<?= the_content(); ?>
		</div>

		<?php
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endwhile; 	
endif;?>

</section>

<?php
get_sidebar();
