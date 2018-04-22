<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test
 */

?>

<article>

	<header class="post-header">
		<h2 class="post-title">
			<a href=<?php the_permalink() ?>><?php the_title(); ?></a>
		</h2>

		<div class="post-meta">
			<span><?php the_date(); ?></span>
			<span><?php the_category(); ?></span>
		</div>
	</header>

	<div class="post-content">
		<?php the_excerpt(); ?>
	</div>

</article>
