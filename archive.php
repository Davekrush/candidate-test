<?php get_header(); // Include the header.php template ?>

<div class="content">
    <h2><?php single_cat_title(); ?></h2>

    <?php
    // Start the WordPress loop for the archive page
    while (have_posts()) {
        the_post();

        // Display the title and excerpt of each post
        ?>
        <article>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div><?php the_excerpt(); ?></div>
        </article>
        <?php
    }
    ?>
</div>

<?php get_footer(); // Include the footer.php template ?>
