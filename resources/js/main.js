$('.card-like').click(function(){
	let id = $(this)[0].id;

	animateLike(this);

	$.get('requests.php?liked='+id, function(data, status){
    	console.log("Data: " + data + "\nStatus: " + status);
  	});
});

function animateLike(obj){

	let $plus = $(obj).children('.plus1');

	$($plus).show();
	$plus.css({bottom: '20px'});

	$plus.animate({bottom: '60px'}, 500, 'swing', function(){
		$(this).hide();
	});
}



//if there is no post hide heading
$('.temp-placeholder').hide();
if(!($('.pinned-section .card').length)){
	$('.pinned-section .heading').hide();
	if(!($('.recent-section .card').length)){
		$('.recent-section .heading').hide();
		$('.temp-placeholder').show();
	}
}