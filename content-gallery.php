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
    <div class="cont-gal">
    <?php the_content(); ?>
  </div>
  </div>
</section>