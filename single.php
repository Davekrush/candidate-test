<?php get_header();  ?>

<div class="content">
    <?php

    while (have_posts()) {
        the_post();


        ?>
        <article>

            <div><?php the_content(); ?></div>
        </article>
        <?php
    }
    ?>
</div>

<?php get_footer();  ?>
