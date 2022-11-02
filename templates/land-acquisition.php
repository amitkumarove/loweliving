<?php

// Template Name: Land Acquisition

the_post();
get_header();
?>

    <?php
        if( have_rows('content_sections') ):
            while ( have_rows('content_sections') ) : the_row();
                include get_stylesheet_directory().'/partials/land-acquisition/'.get_row_layout().'.php';
            endwhile;
        endif;
    ?>

<?php get_footer(); ?>
