jQuery(window).load(function() { // MASSONRY Without jquery 
var container = document.querySelector('.container'); 
var msnry = new Masonry( container, {itemSelector: 'section', columnWidth: 'section', 
}); }); 

jQuery(document).ready(function($) {
$(".mn-hl").click(function(){$(".mainmenu").toggle("fast"); });
$(".menu-item a").click(function(){$(".mainmenu").toggle("fast"); });
$('#nav a').last().addClass('last');
$('.scroll a').click(function(event){     
event.preventDefault();
$('html,body').animate({scrollTop:$(this.hash).offset().top}, 800);
});
$('img[title]').each(function() { $(this).removeAttr('title'); });
});

/*
$(function() { 
var $allVideos = $("iframe[src^='//player.vimeo.com'], iframe[src^='//www.youtube.com'], object, embed"),
$fluidEl = $("figure");
$allVideos.each(function() {
$(this)
// jQuery .data does not work on object/embed elements
.attr('data-aspectRatio', this.height / this.width)
.removeAttr('height')
.removeAttr('width');
});
$(window).resize(function() {
var newWidth = $fluidEl.width();
$allVideos.each(function() {
var $el = $(this);
$el
.width(newWidth)
.height(newWidth * $el.attr('data-aspectRatio'));
});
}).resize();
});
*/
