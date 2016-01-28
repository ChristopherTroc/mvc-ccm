<!--  <div class="container">
         <div class="col-lg-3 m-top-5">
           <img class="img-responsive" src="./myapp/views/assets/images/qenergia.jpg" >
         </div>
      </div> -->
 <div class="container m-top-30"> 
   <div class="col-lg-offset-4 col-lg-4 panel panel-default padding-0">
      
      <div class="panel-heading">
      <div class="panel-title">CCM Fotografía </div>
        <div style="float:right; font-size: 80%; position: relative; top:-10px;"><a class="green" href="#recovery_modal" role="button" data-toggle="modal" >¿Olvido su password?</a></div>
      </div>
      
      <div class="panel-body p-top-30" >
        <form name="login" action="<?$helper->urldispatch('login');?>" method="POST" rol="form" class="form-horizontal">
          <div class="input-group m-bottom-25">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" name="user" class="form-control" placeholder="username or email">
          </div>
          <div class="input-group m-bottom-25">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" name="pass" class="form-control" placeholder="password">
          </div>
        
          <button type="submit" class="btn btn-primary">Ingresar</button>
        
        </form>
      </div>
    
   </div>
   
 
</div>
    
<!-- Modal HTML -->
<div id="recovery_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Recupera tu password</h4>
            </div>
            <div class="modal-body">
                <p>Para recuperar tu password, ingresa tu e-mail de usuario.</p>
                <div id="ajax_response"></div>
                <form id="recovery_pass" role="form" class="form-horizontal">
                 <input type="text" name="user_email" id="user_email" class="form-control" placeholder="tu@email.com">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                <button type="button" id="send_email" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</div>


<script>

function validate_email(email){
    validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    if(email == "" || !validacion_email.test(email) ) { return false; } else { return true; }
}

$(document).ready( function(){
  
  //Recovery pass form
  $("#send_email").click(function(){
    
    var email = $("#user_email").val();
    
    if(!validate_email(email)){
      $("#user_email").focus();
      return false;
    }
   
   $("#ajax_response").html("<div class='col-lg-2 col-lg-offset-5' style='padding:5px'><img src='<? $helper->urldispatch('images'); ?>loading.gif' class='img-responsive' /></div>");
   var url= "<?$helper->urldispatch('recovery_password')?>";
   var datastring = "email="+email;
   
   $.ajax({
          type:    "GET",
          url:     url,
          data:    datastring,
          success: function(data){
            
            if(data == 1){
              html = "<div class='alert alert-success'>Revice su casilla de correo, Se han enviado las intrucciones para la recuperación de su password.<div>";
              $("#ajax_response").fadeIn(1000).html(html);
              return;
       }

            if(data == 2){
              html = "<div class='alert alert-danger'>El email ingresado, no se encuentra en los registros del sistema. Chequee la información ingresada.<p>";
              $("#ajax_response").fadeIn(1000).html(html);
              return;
            }
            //for debug
            //$("#ajax_response").fadeIn(1000).html(data); return;
            
            location.reload();
            
          }
        
  });

  });
  
  //hide alert after of 5 seconds
  setTimeout(function() { $(".alert").animate({opacity:"hide"});}, 5000);

});


</script>   



