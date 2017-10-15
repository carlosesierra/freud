<?php get_header();?>
<?php get_sidebar();?>
<div class="container blog">
  <?php 
	 if (have_posts() ) :  
		while (have_posts() ) :the_post(); ?>
			<section>
  			<div class="thumbnail-img">
          <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('large'); ?>
          </a>
          <div class="title">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
              <?php the_title(); ?>
            </a>
          </div>
        </div>
    	</section>
    <?php endwhile;
  endif;
?>
</div>
<?php get_footer();?>