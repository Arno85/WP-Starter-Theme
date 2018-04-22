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
		while ( have_posts() ) : the_post(); ?>
			<article>
				<div class="page-header">
					<h1 class="page-title"><?= the_title(); ?></h1>
				</div> 
				<div class="page-content">
					<?= the_excerpt(); ?>
				</div>
			</article>
		<?php

		
			//get_template_part( 'template-parts/content', get_post_format() );

		endwhile;

		the_posts_navigation();
		?>
		</div>
		<?php
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>
	
</section>

<?php
get_sidebar();

