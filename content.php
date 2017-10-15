<section id="post-<?php the_ID(); ?>">
  <div class="cont">
    <div class="title">
      <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
        <?php the_title(); ?>
      </a>
    </div>
    <?php the_content(); ?>
  </div>
</section>