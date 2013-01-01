$(document).ready(function(){
	$('#top-menu li').hover(function(){
		$(this).find('ul:first').css({visibility:'visible',display:'none'}).show(400);
	},function(){
		$(this).find('ul:first').css({visibility:'hidden'});
	});
});