<?php 
/**
* Template Name: Flexible Content
*/ ?>

<?php get_header(); ?>
<?php get_template_part ('template-parts/site-wide/content', 'hero') ;?>

<?php if( have_rows('page_blocks') ):
  while( have_rows('page_blocks') ): the_row();
    $layout_name = get_row_layout();
    get_template_part( "page-sections/sections/$layout_name" );
  endwhile;
endif; ?>

<?php get_footer(); ?>