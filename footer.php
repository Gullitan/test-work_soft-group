<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package test-work_soft-group
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <a href="<?php echo esc_url(__('https://github.com/Gullitan', 'test-work_soft-group')); ?>"><?php printf(esc_html__('Proudly powered by Gullitan', 'test-work_soft-group'), 'WordPress'); ?></a>
        <span class="sep"> | <?php echo date('Y'); ?> </span>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
