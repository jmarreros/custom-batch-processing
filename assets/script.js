
(function($){

	$(document).on('click','.process',function(e){
         e.preventDefault();
         console.log(`Se realizó el click ➡️`);
	 	// link = $(this);
	 	// id   = link.attr('href').replace(/^.*#more-/,'');

		// $.ajax({
		// 	url : dcms_vars.ajaxurl,
		// 	type: 'post',
		// 	data: {
		// 		action : 'dcms_ajax_readmore',
		// 		id_post: id
		// 	},
		// 	beforeSend: function(){
		// 		link.html('Cargando ...');
		// 	},
		// 	success: function(resultado){
		// 		 $('#post-'+id).find('.entry-content').html(resultado);
		// 	}

		// });

	});

})(jQuery);



