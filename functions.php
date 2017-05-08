<?php
/**
 * test-work_soft-group functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package test-work_soft-group
 */

if ( ! function_exists( 'test_work_soft_group_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function test_work_soft_group_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on test-work_soft-group, use a find and replace
	 * to change 'test-work_soft-group' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'test-work_soft-group', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'test-work_soft-group' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'test_work_soft_group_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'test_work_soft_group_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function test_work_soft_group_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'test_work_soft_group_content_width', 640 );
}
add_action( 'after_setup_theme', 'test_work_soft_group_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function test_work_soft_group_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'test-work_soft-group' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'test-work_soft-group' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Categories', 'test-work_soft-group' ),
        'id'            => 'categories',
        'description'   => esc_html__( 'Add widgets here.', 'test-work_soft-group' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Archives', 'test-work_soft-group' ),
        'id'            => 'archives',
        'description'   => esc_html__( 'Add widgets here.', 'test-work_soft-group' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ) );
}
add_action( 'widgets_init', 'test_work_soft_group_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function test_work_soft_group_scripts() {
// Bootstrap stylesheet.

    wp_enqueue_style('bootstrap-style', get_template_directory_uri() .
        '/libs/bootstrap/css/bootstrap.min.css', array(), ' ');
    wp_enqueue_style( 'test-work_soft-group-style', get_stylesheet_uri() );
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=Droid+Sans:400,700|Droid+Serif:400,400i,700');
    wp_enqueue_style( 'test-work_soft-group-styles', get_template_directory_uri() . '/css/main.css' );

    wp_enqueue_script( 'test-work_soft-group-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
//Bootstrap js

    wp_enqueue_script('bootstrap-js', get_template_directory_uri() .
        '/libs/bootstrap/js/bootstrap.min.js', array('jquery'), ' ');
	wp_enqueue_script( 'test-work_soft-group-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'test_work_soft_group_scripts' );

// logo
function test_work_soft_group_theme_customizer($wp_customize)
{

    $wp_customize->add_section('logo_section', array(
        'title' => __('Site logo', 'gh_exam'),
        'priority' => 30,
        'description' => 'Upload a logo for this theme',
    ));

    $wp_customize->add_setting('logo', array(
        'default' => get_bloginfo('template_directory') . '/img/logo.png',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'test_work_soft_group_logo', array(

        'label' => __('Current logo', 'gh_exam'),
        'section' => 'logo_section',
        'settings' => 'logo',
    )));

}

add_action('customize_register', 'test_work_soft_group_theme_customizer');


/**
 * pagination
 */

// numbered pagination
function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        echo "</div>\n";
    }
}




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_action('customize_register', function ($customizer) {
    $customizer->add_section(
        'title_home',
        array(
            'title' => 'Title home',
            'description' => 'Edit',
            'priority' => 35,
        )
    );
    $customizer->add_setting(
        'title_home',
        array('default' => 'Welcome to AutoWorld!')
    );
    $customizer->add_control(
        'title_home',
        array(
            'label' => 'title_home',
            'section' => 'title_home',
            'type' => 'text',
        )
    );
});

add_action('customize_register', function ($customizer) {
    $customizer->add_section(
        'description',
        array(
            'title' => 'Description',
            'description' => 'Edit',
            'priority' => 35,
        )
    );
    $customizer->add_setting(
        'description',
        array('default' => 'dcaewshrehytjd,md y j edtyjy  yj')
    );
    $customizer->add_control(
        'description',
        array(
            'label' => 'description',
            'section' => 'description',
            'type' => 'text',
        )
    );
});