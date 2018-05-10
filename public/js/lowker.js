$(document).on('click touchstart', '.like-jobs .btn-like', function(){
	var _this = $(this);

	var _url = "/like/" + _this.attr('data-type') + "/" + _this.attr('data-model-id');

	$.get(_url, function(data){

		if(data == '0'){
			_this.parents('.like-wrapper').find('.like-warning').show().delay(1000).fadeOut('slow');
		}
		else{
		_this.removeClass('btn-like').addClass('btn-danger btn-unlike').html('<span class="glyphicon glyphicon-thumbs-down"></span> Unlike');

		var likeNumber = _this.parents('.like-wrapper').find('.like-number');
		likeNumber.html(parseInt(likeNumber.html()) + 1);
		}
	});
});

$(document).on('click touchstart', '.like-comment .btn-like', function(){
	var _this = $(this);

	var _url = "/like/" + _this.attr('data-type') + "/" + _this.attr('data-model-id');

	$.get(_url, function(data){

		if(data == '0'){
			_this.parents('.like-wrapper').find('.like-warning').show().delay(1000).fadeOut('slow');
		}
		else{
		_this.removeClass('btn-like').addClass('btn-danger btn-unlike').html('<span class="glyphicon glyphicon-thumbs-down"></span>');

		var likeNumber = _this.parents('.like-wrapper').find('.like-number');
		likeNumber.html(parseInt(likeNumber.html()) + 1);
		}
	});
});

$(document).on('click touchstart', '.like-jobs .btn-unlike', function(){
	var _this = $(this);

	var _url = "/unlike/" + _this.attr('data-type') + "/" + _this.attr('data-model-id');

	$.get(_url, function(data){
		
		_this.removeClass('btn-danger btn-unlike').addClass('btn-default btn-like').html('<span class="glyphicon glyphicon-thumbs-up"></span> Like');

		var likeNumber = _this.parents('.like-wrapper').find('.like-number');
		likeNumber.html(parseInt(likeNumber.html()) - 1);
		
	});
});

$(document).on('click touchstart', '.like-comment .btn-unlike', function(){
	var _this = $(this);

	var _url = "/unlike/" + _this.attr('data-type') + "/" + _this.attr('data-model-id');

	$.get(_url, function(data){
		_this.removeClass('btn-danger btn-unlike').addClass('btn-default btn-like').html('<span class="glyphicon glyphicon-thumbs-up"></span>');
		

		var likeNumber = _this.parents('.like-wrapper').find('.like-number');
		likeNumber.html(parseInt(likeNumber.html()) - 1);
		
	});
});