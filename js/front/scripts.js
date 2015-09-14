$(window).scroll(function(e){

	if($('#masthead').offset().top !== 0){
		if(!$('#masthead').hasClass('drop-shadow')){
			$('#masthead').addClass('drop-shadow');
		}
	}else{
		$('#masthead').removeClass('drop-shadow');
	}

});

$(function(){
//	common scripts
	$('#x-show-search').click(function(){
		showSearchBar();
		return false;
	});
	
	$('#x-hide-search').click(function(){
		hideSearchBar();
		return false;
	});
	
	if ( $('#contact-form').length ) { $.getScript('/js/front/forms.js'); $.getScript('/js/front/regula.js');}
	
});

function showSearchBar()
{
	$('#x-scopes-bar').slideUp('slow');
	$('#x-search').slideDown('slow');
	$('#input-search').focus();
}

function hideSearchBar()
{
	$('#x-scopes-bar').slideDown('slow');
	$('#x-search').slideUp('slow');
}