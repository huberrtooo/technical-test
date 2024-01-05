<?php

/**
 * Taxonomy Template for "Book Genre"
 *
 * @link https://developer.wordpress.org/themes/template-files-section/taxonomy-templates/
 *
 * @since TwentyTwenty Child 1.0
 */

get_header();
?>

<main id="site-content">
    <?php

    $term = get_queried_object();

    echo '<h1 class="genre-title">' . esc_html__('Books in Genre: ', 'text_domain') . $term->name . '</h1>';

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'library',
        'paged' => $paged,
        'tax_query' => array(
            array(
                'taxonomy' => 'book-genre',
                'field' => 'id',
                'terms' => $term->term_id,
            ),
        ),
    );

    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) :

        $i = 0;

        while ($custom_query->have_posts()) :
            ++$i;
			if ( $i > 1 ) {
				echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
			}
            $custom_query->the_post();


			get_template_part( 'template-parts/content', get_post_type() );

        endwhile;

        echo '<div class="genre-pagination">';
        echo paginate_links(array(
            'total' => $custom_query->max_num_pages,
            'current' => max(1, get_query_var('paged')),
        ));
        echo '</div>';

        wp_reset_postdata();

    else :

        echo 'No books found in this genre';

    endif; ?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();
