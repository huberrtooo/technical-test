<?php

/**
 * The template for displaying content for library
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since TwentyTwenty Child 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <?php

    if (is_singular()) {
        the_title('<h1 class="entry-title">', '</h1>');
    } else {
        the_title('<h2 class="entry-title heading-size-1"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
    }

    echo '<p class="post-meta"><strong>Data:</strong> ' . get_the_date('F j, Y') . '</p>';

    $taxonomy_terms = get_the_terms(get_the_ID(), 'book-genre');


    if ($taxonomy_terms && !is_wp_error($taxonomy_terms)) {
        echo '<p class="post-meta"><strong>Genre:</strong>';

        $term_links = array();

        foreach ($taxonomy_terms as $term) {
            $term_name = $term->name;
            $term_link = get_term_link($term);
            $term_links[] = '<a href="' . esc_url($term_link) . '">' . esc_html($term_name) . '</a>';
        }

        echo implode('| ', $term_links);

        echo '</p>';
    }

    if (!is_search()) {
        get_template_part('template-parts/featured-image');
    }

    // if(is_single()){
    //     the_content();
    // }

    ?>

</article><!-- .post -->