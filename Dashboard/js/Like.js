
var Flag=false;

$(".bx").click(function(){
    if(!Flag){
    $(this).addClass("bxs-like");
    
    Flag=true;

    }
    else{
    $(this).removeClass("bxs-like");
   $(this).addClass("bx-like");
    Flag=false;

    }


});
