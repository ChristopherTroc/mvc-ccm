<!-- update user view -->
<div class="container m-top-20">

  <div class="col-lg-12 row"> 
    <div class="panel panel-default">
      <div class="panel-body">
        <span class="glyphicon glyphicon-circle-arrow-up"></span>&nbsp;
        <span class="text text-danger"><strong>Actualizacion de Usuarios</strong></span>
        <span class="glyphicon glyphicon-arrow-right"></span>
        <span class="text text-info"><strong>Usuario de sistema</strong></span>
      </div>
    </div>
  </div>

  <div class="col-lg-8 row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title"> Ver o actualizar, usuario de sistema </div>
        <div class="pull-right" style="margin-top:-1.9em">
          <button id="edit_user" class="btn btn-primary btn-sm" type="button"><span class="glyphicon glyphicon-edit"></span>&nbsp;Editar </button>
        </div>
      </div>
      <div class="panel-body">
        <form action="<?$helper->urldispatch('update_user')?>/update_user" method="POST"  class="form-horizontal">
          <div>
            <p class="text-danger"><small>* Todos los campos son requeridosa</small></p>
            <hr></hr>
          </div>
         
          <div class="form-group">
            <label class="control-label col-lg-3">Nombre de Usuario: </label>
            <div class="col-lg-8">
              <input type="text" name="name" id="name" value="<?=$user_info[name]?>" readonly="readonly" class="form-control" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">Apellido's Usuario : </label>
            <div class="col-lg-8">
              <input type="text" name="last_name" id="last_name" value="<?=$user_info[last_name]?>" readonly="readonly" class="form-control" >
            </div>
          </div>
           
          <div class="form-group">
            <label class="control-label col-lg-3">Email: </label>
            <div class="col-lg-8">
              <input type="text" name="email" id="email" value="<?=$user_info[email]?>" readonly="readonly" class="form-control" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">Confirme Email: </label>
            <div class="col-lg-8">
              <input type="text" name="email_confirm" id="email_confirm" value="<?=$user_info[email]?>" readonly="readonly" class="form-control" >
            </div>
          </div>

          <input type="hidden" name="id" value="<?=$user_info[id]?>" />

          <button type="submit" id="submit_btn" class="btn btn-primary" style="display:none"> Actualizar Usuario </button>
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

  $("#edit_user").click(function(){

    if($("#name").attr('readonly')){ $("#name").attr('readonly', false); } else { $("#name").attr('readonly', true); }
    if($("#last_name").attr('readonly')){ $("#last_name").attr('readonly', false); } else { $("#last_name").attr('readonly', true); }
    if($("#email").attr('readonly')){ $("#email").attr('readonly', false); } else { $("#email").attr('readonly', true); }
    if($("#email_confirm").attr('readonly')){ $("#email_confirm").attr('readonly', false); } else { $("#email_confirm").attr('readonly', true); }
    $("#submit_btn").toggle();
  });
   
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
