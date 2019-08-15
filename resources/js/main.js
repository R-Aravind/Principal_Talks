$('.clap, .clap-dis').click(function(){
    if($(this).hasClass('clap') 
    && !($(this).next('.clap-dis').hasClass('active'))){
        $(this).addClass('active');
    }
    else if($(this).hasClass('clap-dis') 
    && !($(this).prev('.clap').hasClass('active'))){
        $(this).addClass('active');
    }
});