<?php get_header(); ?>
<center>
<br><br><h1 class="page-title"><?php _e( 'Wrong turn space cadet!</br> </br>We better go back home... just click on the image below.', 'freud' ); ?></h1>
<a href="<?php echo home_url(); ?>"/>
	<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
</a>	
</center>
<?php get_footer(); ?>
