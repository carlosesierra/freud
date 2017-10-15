<div id="sidebar">
<div class="logo">
	<a href="<?php echo home_url(); ?>"/>
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	</a>
</div>
<!--div class="mn">
	<input id="hamburger" type="checkbox" class="hamburger-checkbox">
	<label for="hamburger" class="hamburger-label" role="button" aria-labelledby="menu">&#9776;</label>
	<nav role="navigation" class="mainmenu">
    	<?php wp_nav_menu(array('theme_location'=>'primary')); ?>
    	<?php wp_nav_menu(array('theme_location'=>'social')); ?>
  	</nav>
</div-->

<div class="mn">
	<div class="mn-h">
		<a href="#" class="mn-hl" >&#9776;</a>
	</div>
	<nav role="navigation" class="mainmenu">
    	<?php wp_nav_menu(array('theme_location'=>'primary')); ?>
    	<?php wp_nav_menu(array('theme_location'=>'social')); ?>
  	</nav>
</div>
<!--div class="widgets-area">
<?php dynamic_sidebar('sidebar-1'); ?>
</div-->
<div class="nxpt">
<?php posts_nav_link(); ?>
</div>
</div>
