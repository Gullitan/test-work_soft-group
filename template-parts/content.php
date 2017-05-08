<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package test-work_soft-group
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="col-sm-6 col-md-6 col-xl-6 ">
        <header class="entry-header">
            <?php
            if ( is_single() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;

            if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
                    <?php test_work_soft_group_posted_on(); ?>
                </div><!-- .entry-meta -->
                <?php
            endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
            the_post_thumbnail();
            ?>
            <span class="short-desc">
                <?php
                    the_field('short_description');
                ?>
            </span>
        </div><!-- .entry-content -->

    </div>
</article><!-- #post-## -->