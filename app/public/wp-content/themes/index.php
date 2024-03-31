<?php get_header(); ?>

<?php 
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); 

        // Post Content here
        the_title(); // Această linie de cod va afișa titlul postării

    } // end while
} // end if
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>