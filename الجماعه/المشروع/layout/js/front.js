// JavaScript Document
/*global $, confirm */



$(function(){
	 
	'use strict';
	
	// Switch Between Login & SignUp
	$('.login-page h3 span').click(function(){
		$(this).addClass('selected').siblings().removeClass("selected");
		$(".login-page form").hide();
		$('.' + $(this).data('class')).fadeIn(100);
	})

	
	$('[placeholder]').focusin(function(){
		
		$(this).attr('data-text',$(this).attr('placeholder'));
		
		$(this).attr('placeholder','');
		
	}).blur(function(){
		
		$(this).attr('placeholder', $(this).attr('data-text'));
		
	});
	
	//Add Asterisk On Required Field
	
	$('input').each(function(){
		
		if ($(this).attr('required') === 'required'){
			$(this).after('<span class="asterisk">*</span>');
		}
		
	});
	

	
	$('.confirm').click(function(){
		
		return confirm('Are You Sure?');
	});

	$('.live').keyup(function(){
		
		$($(this).data('class')).text($(this).val());
	});

	$('.navbar-nav .nav-item a').click(function(e) {

        $('.navbar-nav .nav-item a').removeClass('active');

        var thas = $(this);
        if (!thas.hasClass('active')) {
            thas.addClass('active');
        }
    });
	$(".navbar-nav .nav-item a").click(function () {
		$(".navbar-nav .nav-item a").removeClass("active");
		$(this).addClass("active");   
	});

});

















