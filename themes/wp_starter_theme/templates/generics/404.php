<?php
/**
 * The template for displaying 404 pages (not found)
 * @author Arnaud Martin
 */
?>

<section class="container">

	<div class="page-header">		
		<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp_starter_theme' ); ?></h1>
	</div>
	
	<div class="page-content">
		<p><?= esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wp_starter_theme' ); ?></p>
	</div>

</section>

