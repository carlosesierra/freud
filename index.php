<?php get_header();?>
<?php get_sidebar();?>
<div class="wrapper">
<div class="container home">
<?php 
	if (have_posts() ) :  
		while (have_posts() ) :the_post(); ?>
		 <?php get_template_part('content',get_post_format()); ?>
   <?php endwhile;
endif; 
?>
</div>
<?php get_footer();?>
</div>
<script type="text/javascript"> jQuery(window).load(function() { // MASSONRY Without jquery 
	var container = document.querySelector('.container'); 
	var msnry = new Masonry( container, {itemSelector: 'section', columnWidth: 'section', 
	}); }); 


$(document).ready(function(){
	$(".mn-hl").click(function(){
        $(".mainmenu").toggle("fast");
    });
    $(".menu-item a").click(function(){
        $(".mainmenu").toggle("fast");
    });
});
</script>