<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package test-work_soft-group
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text"
       href="#content"><?php esc_html_e('Skip to content', 'test-work_soft-group'); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3 logo">
                    <a href="http://testwork-softgroup.loc">
                        <?php if (get_theme_mod('logo')) {
                            echo '<img src="' . esc_url(get_theme_mod('logo')) . '">';
                        } ?>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 navig">
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <button class="menu-toggle" aria-controls="primary-menu"
                                aria-expanded="false"><?php esc_html_e('Primary Menu', 'test-work_soft-group'); ?></button>
                        <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu')); ?>
                    </nav><!-- #site-navigation -->
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 sidebar">
                    <?php
                    dynamic_sidebar();
                    ?>
                </div>
            </div>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
