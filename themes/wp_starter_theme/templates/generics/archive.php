<?php
/**
 * The template for displaying archive pages
 * @author Arnaud Martin
 */
?>

<section class="container">

	<?php
	if ( have_posts() ) : ?>

		<div class="page-header">
			<?=
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</div>
		<div class="page-content">

		<?php 
		while ( have_posts() ) : the_post(); 

			get_template_part( 'templates/parts/posts-content');

		endwhile;

	else :

		get_template_part( 'templates/parts/posts-none');

	endif; ?>
	
</section>

<?php
get_sidebar();

