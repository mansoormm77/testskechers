$.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;


	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });

	$('#mark_attendance').on('click', function(event) {
		event.preventDefault();
		var id = $(this).attr('data-id');
		var contactno = $(this).attr('data-contactno');
		var club_id = $('#club').val();
		if(club_id != ''){
			$.ajax({url: "/sketcher/main/public/add_attendance?id="+id+"&club_id="+club_id, 
					success: function(result) {
						$('#mark_attendance').css('display', "none");
						$('#remove_attendance').css('display', 'block');
						$('#club_field').css('display', "none");
						$('#error-club').css('display','none');

			}});
		}else{
			$('#error-club').css('display','block');
		}
		
	});
	$('#remove_attendance').on('click', function(event) {
		event.preventDefault();
		var id = $(this).attr('data-id');
		var contactno = $(this).attr('data-contactno');

		$.ajax({url: "/sketcher/main/public/remove_attendance?id="+id, 
				success: function(result) {
					$('#mark_attendance').css('display', "block");

					$('#remove_attendance').css('display', "none");
					$('#club_field').css('display', "block");
		}});
	});
	
	let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
	  scanner.addListener('scan', function (content) {
		console.log(content);
		document.getElementById("nf-id").value = content;
		document.getElementById('attendance_form').submit();
	  });
		 $('#start_scan').click(function(e){
			   e.preventDefault();
			   Instascan.Camera.getCameras().then(function (cameras) {
				   if (cameras.length > 0) {
					 scanner.start(cameras[1]);
					 $('#preview').css('display','block');
				   } else {
					   $('#preview').css('display','none');
					 console.error('No cameras found.');
				   }
				 }).catch(function (e) {
					$('#preview').css('display','none');
				   console.error(e);
				 });
		   });
});