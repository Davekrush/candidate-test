<footer>
    <?php

    wp_nav_menu(array(
        'theme_location' => 'footer-menu', 
        'container' => false,
        'menu_class' => 'footer-menu', 
    ));
    ?>
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
