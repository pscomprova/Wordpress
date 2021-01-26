jQuery(document).ready( function($){

	/* Ajax functions */
	$(document).on('click','#sincontru-load-more', function(){

    var that = $(this);
		var page = $(this).data('page');
    var newPage = page+1;
	  var ajaxurl = $(this).data('url');
		var archive = that.data('archive');

		if (typeof archive === 'undefined') {
			archive = 0;
		}

    $.ajax({
      url : ajaxurl,
      type : 'post',
      data : {
        page : page,
				archive : archive,
        action : 'sincontru_load_more'
      },
      error : function(response){
        console.log(response);
      },
      success : function(response){
				if (response == 0){
					$('#sincontru-posts-container').append('<div class="text-center"><h3>Take it easy!</h3><p>Non ci sono al momento altri articoli da caricare</p></div>');
				} else {
					that.data('page', newPage);
	        $('#sincontru-posts-container').append(response);
				}
      }
    });

	});

	/*open-close sidebar*/

	$(document).on('click', '.js-toggleSidebar', function() {
		$('.sincontru-sidebar').toggleClass('opened');
	});

});
