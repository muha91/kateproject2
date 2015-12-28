$(function(){
	$('.menu_item a:eq(0)').bind('mouseover', function(){
		$('.header').css({
			'background':'yellow'
		});
	
	});
	
	$('.menu_item>a:eq(1)').bind('mouseover', function(){
		$('.header').css({
			'background':'green'
		});
	
	});
	
	$('.menu_item>a:eq(2)').bind('mouseover', function(){
		$('.header').css({
			'background':'blue'
		});
	
	});
	
	$('.menu_item>a:eq(3)').bind('mouseover', function(){
		$('.header').css({
			'background':'red'
		});
	
	});
	
	$('.menu_item>a:eq(4)').bind('mouseover', function(){
		$('.header').css({
			'background':'dark'
		});
	
	});
	
	$('.menu_item>a:eq(5)').bind('mouseover', function(){
		$('.header').css({
			'background':'green'
		});
	
	});
	
	$('.menu_item>a:eq(6)').bind('mouseover', function(){
		$('.header').css({
			'background':'pink'
		});
	
	});
	
	$('.menu_item').bind('mouseout', function(){
		$('.header').css({
			'background':'url(media/img/bkgr_header.gif)'
		});
	});
});