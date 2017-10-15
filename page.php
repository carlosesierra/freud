<?php get_header();?>
<?php get_sidebar();?>
<div class="container page">
  <?php 
  	if (have_posts() ) :  
  		while (have_posts() ) :the_post(); ?>
  			<section>
      		<h1 class="title">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
              <?php the_title(); ?>
            </a>
          </h1>
      		<div class="thumbnail-img">
            <?php the_post_thumbnail('large'); ?>
          </div>
          <article>
        		  <?php the_content(); ?>
        	</article>
      	</section>
      <?php endwhile;
    endif;
  ?>
</div>
<?php get_footer();?>