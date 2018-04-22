<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
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

    <?php endwhile; ?>
<?php endif; ?>

</section>

<?php 
get_sidebar();
