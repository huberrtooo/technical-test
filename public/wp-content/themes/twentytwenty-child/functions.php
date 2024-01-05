<?php

/**
 * Enqueue the Child Theme Stylesheet.
 *
 * Load child theme styles after parent theme styles.
 *
 * @since TwentyTwenty Child 1.0
 */
function f_enqueue_child_theme_styles()
{
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css',
    );
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/dist/main.css',
        ['parent-style'],
        '1.0.0',
        'all'
    );
}
add_action('wp_enqueue_scripts', 'f_enqueue_child_theme_styles');



/**
 * Enqueue the Child Theme Scripts.
 *
 * Enqueue jQuery and then Enqueue the custom script
 *
 * @since TwentyTwenty Child 1.0
 */
function f_enqueue_child_theme_scripts()
{
    wp_enqueue_script('jquery');

    wp_enqueue_script(
        'custom-scripts',
        get_stylesheet_directory_uri() . '/assets/js/scripts.js',
        ['jquery'],
        '1.0.0',
        true
    );

    wp_localize_script('custom-scripts', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php'))); // pass AJAX URL to scripts.js

}
add_action('wp_enqueue_scripts', 'f_enqueue_child_theme_scripts');




/**
 * Register Custom Post Type "Books"
 *
 * @since TwentyTwenty Child 1.0
 */
if (!function_exists('custom_post_type')) {
    function f_custom_post_type_books()
    {
        $labels = [
            'name'                  => _x('Books', 'Post Type General Name', 'technicaltest_domain'),
            'singular_name'         => _x('Book', 'Post Type Singular Name', 'technicaltest_domain'),
            'menu_name'             => __('Library', 'technicaltest_domain'),
            'name_admin_bar'        => __('Book', 'technicaltest_domain'),
            'archives'              => __('Book Archives', 'technicaltest_domain'),
            'attributes'            => __('Book Attributes', 'technicaltest_domain'),
            'parent_item_colon'     => __('Parent Book:', 'technicaltest_domain'),
            'all_items'             => __('All Books', 'technicaltest_domain'),
            'add_new_item'          => __('Add New Book', 'technicaltest_domain'),
            'add_new'               => __('Add New', 'technicaltest_domain'),
            'new_item'              => __('New Book', 'technicaltest_domain'),
            'edit_item'             => __('Edit Book', 'technicaltest_domain'),
            'update_item'           => __('Update Book', 'technicaltest_domain'),
            'view_item'             => __('View Book', 'technicaltest_domain'),
            'view_items'            => __('View Books', 'technicaltest_domain'),
            'search_items'          => __('Search Book', 'technicaltest_domain'),
            'not_found'             => __('Not found', 'technicaltest_domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'technicaltest_domain'),
            'featured_image'        => __('Featured Image', 'technicaltest_domain'),
            'set_featured_image'    => __('Set featured image', 'technicaltest_domain'),
            'remove_featured_image' => __('Remove featured image', 'technicaltest_domain'),
            'use_featured_image'    => __('Use as featured image', 'technicaltest_domain'),
            'insert_into_item'      => __('Insert into book', 'technicaltest_domain'),
            'uploaded_to_this_item' => __('Uploaded to this book', 'technicaltest_domain'),
            'items_list'            => __('Books list', 'technicaltest_domain'),
            'items_list_navigation' => __('Books list navigation', 'technicaltest_domain'),
            'filter_items_list'     => __('Filter books list', 'technicaltest_domain'),
        ];
        $args = [
            'label'                 => __('Book', 'technicaltest_domain'),
            'description'           => __('Books Custom Post Type', 'technicaltest_domain'),
            'labels'                => $labels,
            'supports'              => ['title', 'editor', 'thumbnail', 'revisions'],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_rest'          => true,
            'menu_position'         => 20,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'menu_icon'             => 'dashicons-book-alt',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        ];
        register_post_type('library', $args);
    }
    add_action('init', 'f_custom_post_type_books', 0);
}


/**
 * Register Custom Taxonomy "Genre"
 *
 * @since TwentyTwenty Child 1.0
 */
if (!function_exists('custom_taxonomy')) {
    function f_custom_taxonomy_genre()
    {
        $labels = [
            'name'                       => _x('Genres', 'Taxonomy General Name', 'technicaltest_domain'),
            'singular_name'              => _x('Genre', 'Taxonomy Singular Name', 'technicaltest_domain'),
            'menu_name'                  => __('Genre', 'technicaltest_domain'),
            'all_items'                  => __('All Genres', 'technicaltest_domain'),
            'parent_item'                => __('Parent Genre', 'technicaltest_domain'),
            'parent_item_colon'          => __('Parent Genre:', 'technicaltest_domain'),
            'new_item_name'              => __('New Genre Name', 'technicaltest_domain'),
            'add_new_item'               => __('Add New Genre', 'technicaltest_domain'),
            'edit_item'                  => __('Edit Genre', 'technicaltest_domain'),
            'update_item'                => __('Update Genre', 'technicaltest_domain'),
            'view_item'                  => __('View Genre', 'technicaltest_domain'),
            'separate_items_with_commas' => __('Separate genres with commas', 'technicaltest_domain'),
            'add_or_remove_items'        => __('Add or remove genres', 'technicaltest_domain'),
            'choose_from_most_used'      => __('Choose from the most used', 'technicaltest_domain'),
            'popular_items'              => __('Popular Genres', 'technicaltest_domain'),
            'search_items'               => __('Search Genres', 'technicaltest_domain'),
            'not_found'                  => __('Not Found', 'technicaltest_domain'),
            'no_terms'                   => __('No genres', 'technicaltest_domain'),
            'items_list'                 => __('Genres list', 'technicaltest_domain'),
            'items_list_navigation'      => __('Genres list navigation', 'technicaltest_domain'),
        ];
        $args = [
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_rest'               => true,
            'show_in_nav_menus'          => true,
        ];
        register_taxonomy('book-genre', ['library'], $args);
    }
    add_action('init', 'f_custom_taxonomy_genre', 0);
}


/**
 * Set posts per page for taxonomy "book-genre"
 *
 * @since TwentyTwenty Child 1.0
 */
function f_modify_posts_per_page()
{
    add_filter('option_posts_per_page', 'f_my_option_posts_per_page');
}

function f_my_option_posts_per_page($value)
{
    global $option_posts_per_page;

    if (is_tax('book-genre')) {

        return 5;

    } else {

        return $option_posts_per_page;

    }
}


add_action('init', 'f_modify_posts_per_page', 0);



/**
 * Shortcode to get title of recent book
 *
 * @since TwentyTwenty Child 1.0
 */
function f_recent_book_title()
{
    $args = array(
        'post_type' => 'library',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $recent_book_query = new WP_Query($args);

    if ($recent_book_query->have_posts()) {

        while ($recent_book_query->have_posts()) {

            $recent_book_query->the_post();

            return '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
        }

        wp_reset_postdata();
    }

    return 'No recent books found.';
}
add_shortcode('shotcode_recent_book_title', 'f_recent_book_title');





/**
 * Shortcode to get books list from specyfic genre and limit to 5
 *
 * @since TwentyTwenty Child 1.0
 */
function f_book_list_from_genre($atts)
{
    $atts = shortcode_atts(['genre_id' => ''], $atts, 'shotcode_books_list');

    $genre_id = $atts['genre_id'];    // get genre ID from shortcode

    $args = array(
        'post_type'         => 'library',
        'posts_per_page'    => 5,
        'orderby'           => 'title',
        'order'             => 'ASC',
        'tax_query'         => [
            [
                'taxonomy' => 'book-genre',
                'field' => 'id',
                'terms' => $genre_id,
            ],
        ],
    );

    $books_query = new WP_Query($args);

    $book_list = '<ul>';

    if ($books_query->have_posts()) {

        while ($books_query->have_posts()) {

            $books_query->the_post();

            $book_list .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';

        }

        wp_reset_postdata();

    } else {

        $book_list .= '<li>No books or wrong ID</li>';

    }

    $book_list .= '</ul>';

    return $book_list;
}
add_shortcode('shotcode_books_list', 'f_book_list_from_genre');





/**
 * AJAX callback to retrieve 20 books in JSON format
 *
 * @since TwentyTwenty Child 1.0
 */

function f_get_books_ajax_callback() {
    $args = array(
        'post_type' => 'library',
        'posts_per_page' => 20,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $books_query = new WP_Query($args);

    $books = array();

    if ($books_query->have_posts()) {

        while ($books_query->have_posts()) {

            $books_query->the_post();

            $book_data = array(
                'name' => get_the_title(),
                'date' => get_the_date(),
                'genre' => wp_get_post_terms(get_the_ID(), 'book-genre', array('fields' => 'names')),
                'excerpt' => get_the_excerpt(),
            );

            $books[] = $book_data;
        }

        wp_reset_postdata();
    }

    wp_send_json($books);
}

add_action('wp_ajax_get_books', 'f_get_books_ajax_callback');
add_action('wp_ajax_nopriv_get_books', 'f_get_books_ajax_callback');
