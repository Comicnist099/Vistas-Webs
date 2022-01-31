
$(".toggle-btn").click(function(){

    $("#sidebar").toggleClass("active");

});

$("#Nosotros").hover(function(){
    console.log("click");
});

$(".Logo_Secciones").click(function(){
    console.log("click");
    $(this).toggleClass("bx-spin ");
    $(this).toggleClass("active");
    
});

