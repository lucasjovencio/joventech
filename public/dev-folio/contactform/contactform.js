jQuery(document).ready(function ($) {
	"use strict";
	//Contact
	$('form.contactForm').submit(function () {
		// var f = $(this).find('.form-group'),
		// 	ferror = false,
		// 	emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;
		// $("#sendmessage").removeClass("show");
		// $("#errormessage").removeClass("show");
		// f.children('input').each(function () { // run all inputs
		// 	var i = $(this); // current input
		// 	var rule = i.attr('data-rule');
		// 	if (rule !== undefined) {
		// 		var ierror = false; // error flag for current input
		// 		var pos = rule.indexOf(':', 0);
		// 		if (pos >= 0) {
		// 			var exp = rule.substr(pos + 1, rule.length);
		// 			rule = rule.substr(0, pos);
		// 		} else {
		// 			rule = rule.substr(pos + 1, rule.length);
		// 		}
		// 		switch (rule) {
		// 			case 'required':
		// 				if (i.val() === '') {
		// 					ferror = ierror = true;
		// 				}
		// 				break;

		// 			case 'minlen':
		// 				if (i.val().length < parseInt(exp)) {
		// 					ferror = ierror = true;
		// 				}
		// 				break;

		// 			case 'email':
		// 				if (!emailExp.test(i.val())) {
		// 					ferror = ierror = true;
		// 				}
		// 				break;

		// 			case 'checked':
		// 				if (!i.is(':checked')) {
		// 					ferror = ierror = true;
		// 				}
		// 				break;

		// 			case 'regexp':
		// 				exp = new RegExp(exp);
		// 				if (!exp.test(i.val())) {
		// 					ferror = ierror = true;
		// 				}
		// 				break;
		// 		}
		// 		i.next('.validation').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
		// 	}
		// });
		// f.children('textarea').each(function () { // run all inputs
			
		// 	var i = $(this); // current input
		// 	var rule = i.attr('data-rule');

		// 	if (rule !== undefined) {
		// 		var ierror = false; // error flag for current input
		// 		var pos = rule.indexOf(':', 0);
		// 		if (pos >= 0) {
		// 			var exp = rule.substr(pos + 1, rule.length);
		// 			rule = rule.substr(0, pos);
		// 		} else {
		// 			rule = rule.substr(pos + 1, rule.length);
		// 		}

		// 		switch (rule) {
		// 			case 'required':
		// 				if (i.val() === '') {
		// 					ferror = ierror = true;
		// 				}
		// 				break;

		// 			case 'minlen':
		// 				if (i.val().length < parseInt(exp)) {
		// 					ferror = ierror = true;
		// 				}
		// 				break;
		// 		}
		// 		i.next('.validation').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
		// 	}
		// });

		// if (ferror) return false;
		// else var str = $(this).serialize();
		// var action = $(this).attr('action');
		// if (!action) {
		// 	return false;
		// }
		// $("#errormessage").html('');
		// $('#preloader-form').show(function(){
		// 	$("body").attr('style','overflow: hidden');
		// });
		// $.ajax({
		// 	type: "POST",
		// 	url: action,
		// 	data: str,
		// 	success: function (msg) {
		// 		$("#sendmessage").addClass("show");
		// 		$("#errormessage").removeClass("show");
		// 		$("#errormessage").html('');
		// 		$('.contactForm').find(".input-text").val("");
		// 		$('#preloader-form').delay(100).fadeOut('slow',function(){
		// 			$("body").attr('style','overflow: initial');
		// 		});
		// 	},
        //     error: function (request, status, error) {
		// 		$("#sendmessage").removeClass("show");
		// 		$("#errormessage").addClass("show");
		// 		$('#errormessage').html("<ul id='errorsContact'></ul>");
		// 		$('#preloader-form').delay(100).fadeOut('slow',function(){
		// 			$("body").attr('style','overflow: initial');
		// 		});
        //         if(request.status == 422){
		// 			for(let key in request.responseJSON.error){
		// 				$('#errorsContact').append("<li style='text-align: left;'>"+request.responseJSON.error[key]+"</li>");
		// 			}
		// 			for(let key in request.responseJSON.errors){
		// 				for(let subkey in request.responseJSON.errors[key]){
		// 					$('#errorsContact').append("<li style='text-align: left;'>"+request.responseJSON.errors[key][subkey]+"</li>");
		// 				}
		// 			}
		// 		}else{
		// 			$("#errormessage").html('Ops... Um erro inesperado aconteceu.');
		// 		}
		// 	}
		// });
		return false;
	});
});

function contactForm(){
	var form = $('form.contactForm');
	var f = $(form).find('.form-group'),
		ferror = false,
		emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;
	$("#sendmessage").removeClass("show");
	$("#errormessage").removeClass("show");
	f.children('input').each(function () { // run all inputs
		var i = $(this); // current input
		var rule = i.attr('data-rule');
		if (rule !== undefined) {
			var ierror = false; // error flag for current input
			var pos = rule.indexOf(':', 0);
			if (pos >= 0) {
				var exp = rule.substr(pos + 1, rule.length);
				rule = rule.substr(0, pos);
			} else {
				rule = rule.substr(pos + 1, rule.length);
			}
			switch (rule) {
				case 'required':
					if (i.val() === '') {
						ferror = ierror = true;
					}
					break;

				case 'minlen':
					if (i.val().length < parseInt(exp)) {
						ferror = ierror = true;
					}
					break;

				case 'email':
					if (!emailExp.test(i.val())) {
						ferror = ierror = true;
					}
					break;

				case 'checked':
					if (!i.is(':checked')) {
						ferror = ierror = true;
					}
					break;

				case 'regexp':
					exp = new RegExp(exp);
					if (!exp.test(i.val())) {
						ferror = ierror = true;
					}
					break;
			}
			i.next('.validation').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
		}
	});
	f.children('textarea').each(function () { // run all inputs
		
		var i = $(this); // current input
		var rule = i.attr('data-rule');

		if (rule !== undefined) {
			var ierror = false; // error flag for current input
			var pos = rule.indexOf(':', 0);
			if (pos >= 0) {
				var exp = rule.substr(pos + 1, rule.length);
				rule = rule.substr(0, pos);
			} else {
				rule = rule.substr(pos + 1, rule.length);
			}

			switch (rule) {
				case 'required':
					if (i.val() === '') {
						ferror = ierror = true;
					}
					break;

				case 'minlen':
					if (i.val().length < parseInt(exp)) {
						ferror = ierror = true;
					}
					break;
			}
			i.next('.validation').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
		}
	});

	if (ferror) return false;
	else var str = $(form).serialize();
	var action = $(form).attr('action');
	if (!action) {
		return false;
	}
	$("#errormessage").html('');
	$('#preloader-form').show(function(){
		$("body").attr('style','overflow: hidden');
	});
	$.ajax({
		type: "POST",
		url: action,
		data: str,
		success: function (msg) {
			$("#sendmessage").addClass("show");
			$("#errormessage").removeClass("show");
			$("#errormessage").html('');
			$('.contactForm').find(".input-text").val("");
			$('#preloader-form').delay(100).fadeOut('slow',function(){
				$("body").attr('style','overflow: initial');
			});
		},
		error: function (request, status, error) {
			$("#sendmessage").removeClass("show");
			$("#errormessage").addClass("show");
			$('#errormessage').html("<ul id='errorsContact'></ul>");
			$('#preloader-form').delay(100).fadeOut('slow',function(){
				$("body").attr('style','overflow: initial');
			});
			if(request.status == 422){
				for(let key in request.responseJSON.error){
					$('#errorsContact').append("<li style='text-align: left;'>"+request.responseJSON.error[key]+"</li>");
				}
				for(let key in request.responseJSON.errors){
					for(let subkey in request.responseJSON.errors[key]){
						$('#errorsContact').append("<li style='text-align: left;'>"+request.responseJSON.errors[key][subkey]+"</li>");
					}
				}
			}else{
				$("#errormessage").html('Ops... Um erro inesperado aconteceu.');
			}
		}
	});
	return false;
}
