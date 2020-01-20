<?php
/**
 * The template for displaying all pages
 * @author Arnaud Martin
 */
?>

<section class="container">

<?php 
if (have_posts()) : 
    while (have_posts()) : the_post(); ?>

    <div class="page-header">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div> 
    
    <div class="page-content">
        <?php the_content(); ?>
    </div>

    <?php 
    endwhile; 
endif; ?>

</section>

<?php 
get_sidebar();
