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