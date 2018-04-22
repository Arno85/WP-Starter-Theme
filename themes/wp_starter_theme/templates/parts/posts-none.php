<?php
/**
 * Template part for displaying a message that posts cannot be found
 * @author Arnaud Martin
 */

?>

<div class="no-results not-found">

	<header class="post-header">
		<h1 class="post-title"><?php esc_html_e( 'Nothing Found', 'wp_starter_theme' ); ?></h1>
	</header>

	<div class="post-content">
		<?php
		if ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wp_starter_theme' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wp_starter_theme' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div>
</div>
