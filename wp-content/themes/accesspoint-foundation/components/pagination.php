<?php
    global $wp_query;
    $big = 999999999;

    $links = paginate_links( array(
        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'    => '?paged=%#%',
        'current'   => max( 1, get_query_var( 'paged' ) ),
        'total'     => $wp_query->max_num_pages,
        'mid_size'  => 2,
        'prev_text' => __( '<i class="fa-solid fa-chevron-left"></i>' ),
        'next_text' => __( '<i class="fa-solid fa-chevron-right"></i>' ),
        'type'      => 'array', 
    ) );

    if ( $links ) :
        echo '<ul class="pagination">';
        foreach ( $links as $link ) {
            $link = str_replace( 'page-numbers', 'pagination__item--link', $link );
            echo '<li class="pagination__item">' . $link . '</li>';
        }
        echo '</ul>';
    endif;
?>