jQuery(function( $ ) {
	'use strict';

	$(document).on("click", "#ph_opener", function(){
		$("#ph_popup").removeClass("dnone");
		$(this).addClass("dnone");
		$("#ph_close").removeClass("dnone");
	});
	$(document).on("click", "#ph_close", function(){
		$('#ph_form').trigger("reset");
		$(".phstep_1").removeClass("dnone");
		$(".phstep_2").addClass("dnone");
		$(".phstep_3").addClass("dnone");
		$(".ph_confirmation").addClass("dnone");

		$("#ph_popup").addClass("dnone");
		$(this).addClass("dnone");
		$("#ph_opener").removeClass("dnone");
	});

	$(document).on("click", ".getStartStep1", function(e){
		e.preventDefault();
		$(".phstep_1").addClass("dnone");
		$(".phstep_2").removeClass("dnone");
	});
	$(document).on("click", ".ph_continue", function(e){
		e.preventDefault();
		if($("#pray_request").val().length > 0){
			$(".phstep_2").addClass("dnone");
			$(".phstep_3").removeClass("dnone");
		}
	});

	$(document).on("keyup", "#pray_request", function(){
		$(".keylength").text($("#pray_request").val().length);
	});

	$(document).on("submit", "#ph_form", function(e){
		e.preventDefault();

		$.ajax({
			type: "post",
			url: ph_ajax.ajaxurl,
			data: {
				action: "submit_ph_form",
				nonce: ph_ajax.nonce,
				request: $("#pray_request").val(),
				name: $("#ph_username").val(),
				email: $("#ph_useremail").val(),
				follow: (($("#ph_toogle").prop("checked"))?"Yes": "No")
			},
			dataType: "json",
			beforeSend: ()=>{
				$(".ph_loader").removeClass("dnone");
			},
			success: function (response) {
				$(".ph_loader").addClass("dnone");
				$(".phstep_3").addClass("dnone");
				$(".ph_confirmation").removeClass("dnone");
			}
		});

	});

});
