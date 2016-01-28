<!-- add user view -->
<div class="container m-top-20">

  <div class="col-lg-12 row"> 
    <div class="panel panel-default">
      <div class="panel-body">
        <span class="glyphicon glyphicon-circle-arrow-up"></span>&nbsp;
        <span class="text text-danger"><strong>Ingreso</strong></span>
        <span class="glyphicon glyphicon-arrow-right"></span>
        <span class="text text-info"><strong>Usuario de sistema</strong></span>
      </div>
    </div>
  </div>

  <div class="col-lg-8 row m-top-10">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title"> Ingreso, Usuario de sistema </div>
      </div>
      <div class="panel-body">
        <form action="<?$helper->urldispatch('add_user')?>/insert_user" method="POST"  class="form-horizontal">
          <div>
            <p class="text-danger"><small>* Todos los campos son requeridosa</small></p>
            <hr></hr>
          </div>
         
          <div class="form-group">
            <label class="control-label col-lg-3">Nombre de Usuario: </label>
            <div class="col-lg-8">
              <input type="text" name="name" id="name" class="form-control" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">Apellido's Usuario : </label>
            <div class="col-lg-8">
              <input type="text" name="last_name" id="last_name" class="form-control" >
            </div>
          </div>
           
          <div class="form-group">
            <label class="control-label col-lg-3">Email: </label>
            <div class="col-lg-8">
              <input type="text" name="email" id="email" class="form-control" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">Confirme Email: </label>
            <div class="col-lg-8">
              <input type="text" name="email_confirm" id="email_confirm" class="form-control" >
            </div>
          </div>

          <button type="submit" id="submit_btn" class="btn btn-primary"> Ingresar Usuario </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>

function validate_email(email){
  validation_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
  if(email == "" || !validation_email.test(email) ) { return false; }
  return true;
}

$(document).ready( function(){
   
   $("#submit_btn").click(function(){
     
     var name          = $("#name").val();
     var last_name     = $("#last_name").val();
     var email         = $("#email").val();
     var email_confirm = $("#email_confirm").val();
     
     if(name == ""){
       $("#name").focus();
       return false;
     } else
     if(last_name == ""){
       $("#last_name").focus();
       return false;
     } else
     if(!validate_email(email)){
       $("#email").focus();
       return false;
     } else
     if(email_confirm != email){
        bootbox.alert("La confirmacion de email no es igual al email ingresado, verifique el campo confiramción de email.");
        $("#email_confirm").focus();
        return false;
     }
     
     return true;
   
   });

   //hide alert after of 5 seconds
   setTimeout(function() {
    $(".alert").animate({opacity:"hide"});
   }, 5000);
 
 });
</script>

