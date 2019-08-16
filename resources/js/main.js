$('.clap, .clap-dis').click(function(){

    let id = $(this).data('id');
    
    if($(this).hasClass('clap') 
    && !($(this).next('.clap-dis').hasClass('active'))){
        $(this).addClass('active');
        sendLike(id);
    }
    else if($(this).hasClass('clap-dis') 
    && !($(this).prev('.clap').hasClass('active'))){
        $(this).addClass('active');
        sendDisLike(id);
    }
});

function sendLike(id){
    console.log(id+ ' is '+ ' liked.');
}

function sendDisLike(id){
    console.log(id+ ' is '+ ' disliked.');
}