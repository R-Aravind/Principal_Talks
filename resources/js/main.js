$('.clap').click(function(){
    let id = $(this).data('id');
    $(this).addClass('active');
    sendLike(id);
});


function sendLike(id){
    $.get("./like.php", {'id': id});
}



// //like dislike (disabled)
// $('.clap, .clap-dis').click(function(){

//     let id = $(this).data('id');
    
//     if($(this).hasClass('clap') 
//     && !($(this).next('.clap-dis').hasClass('active'))){
//         $(this).addClass('active');
//         sendLike(id);
//     }
//     else if($(this).hasClass('clap-dis') 
//     && !($(this).prev('.clap').hasClass('active'))){
//         $(this).addClass('active');
//         sendDisLike(id);
//     }
// });

// // (disabled)
// function sendDisLike(id){
//     console.log(id+ ' is '+ ' disliked.');
// }