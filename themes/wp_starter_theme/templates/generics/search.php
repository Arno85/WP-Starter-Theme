<?php
/**
 * The template for displaying search results pages
 * @author Arnaud Martin
 */
?>

<section class="container">
	<?php
	if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?=
				printf( esc_html__( 'Search Results for: %s', 'wp_starter_theme' ), '<span>' . get_search_query() . '</span>' );
			?></h1>
		</header>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'templates/parts/posts-content');

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( 'templates/parts/posts-none');

	endif; ?>

</section>

<?php
get_sidebar();

