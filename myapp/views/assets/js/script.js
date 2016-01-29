 jQuery(document).ready(function($) {
 
    $(".scroll a, .gototop").click(function(event){   
    event.preventDefault();
    $('html,body').animate({scrollTop:$(this.hash).offset().top}, 600,'swing');
    $(".scroll li").removeClass('active');
    $(this).parents('li').toggleClass('active');
    });
    });






var wow = new WOW(
  {
    boxClass:     'wowload',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true        // act on asynchronously loaded content (default is true)
  }
);
wow.init();




$('.carousel').swipe( {
     swipeLeft: function() {
         $(this).carousel('next');
     },
     swipeRight: function() {
         $(this).carousel('prev');
     },
     allowPageScroll: 'vertical'
 });



$("#submit").click(function(){
    
    if($("#name").val() == ""){
        $("#name").focus();
        return false;
    } else 
    if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
        $("#email").focus();
        return false;
    } else 
    if($("#message").val() == ""){
        $("#message").focus();
        return false;
    }

    $('#response').html("<div class='alert alert-info'> Enviando ... </div>");

    $.ajax({
            type:    "POST",
            url:     "web/contact",
            data:    { name:$("#name").val(), email:$("#email").val(), message:$("#message").val() },
            success: function(data){
              
            //for debug
            //alert(data); return;
              if(data == 1){
                    $('#response').html("<div class='alert alert-success'>");
                    $('#response > .alert-success').append("<strong>Su mensaje ha sido enviado. </strong>");
                    $('#response > .alert-success').append('</div>');
                    $("#name").val("");
                    $("#email").val("");
                    $("#message").val("");
                    return false;
              } else {
                    $('#response').html("<div class='alert alert-danger'>");
                    $('#response > .alert-danger').append("<strong>"+data+"</strong>");
                    $('#response > .alert-danger').append('</div>');
                    return false;
                 }
            
            
            }//End success function 
    });//End Ajax function

   return false; 
});


