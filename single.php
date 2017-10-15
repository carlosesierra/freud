<?php get_header();?>
<?php get_sidebar();?>
<div class="container">
<?php 
	if (have_posts() ) :  
		while (have_posts() ) :the_post(); ?>
			<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  			<h1 class="title">
          <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
            <?php the_title(); ?></a>
          </h1>
          <small><?php the_tags('', '', ''); ?></small>
        <article>
    		<?php the_content(); ?>
        <?php wp_link_pages(); ?>
    		</article>
        <?php comments_template(); ?>
    		</section>
   <?php endwhile;
  endif;
?>
</div>
<?php get_footer();?>