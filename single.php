<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package test-work_soft-group
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="conteiner">
                <div class="row ">
		<?php
		while ( have_posts() ) : the_post();
		?>
            <div class="col-md-12 ">
<?php
the_title( '<h2 class="entry-title">', '</h2>' );
the_post_thumbnail('full');

?>
                <span class="content">
                        <?php
                            the_content();
                        ?>
                    </span>
            </div>

            <?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
