<!-- edit password view -->
<div class="container m-top-20">

  <div class="col-lg-12 row"> 
    <div class="panel panel-default">
      <div class="panel-body">
        <span class="glyphicon glyphicon-lock"></span>&nbsp;
        <span class="text text-danger"><strong>Cambiar</strong></span>
        <span class="glyphicon glyphicon-arrow-right"></span>
        <span class="text text-info"><strong>Contraseña</strong></span>
      </div>
    </div>
  </div>

  <div class="col-lg-6 row m-top-10">
    <div class="panel panel-default">

      <div class="panel-heading">
        <div class="panel-title"> Ingresa tu nueva contraseña </div>
      </div>

      <div class="panel panel-body">

        <form class="form-horizontal" role="form" method="POST" action="<?$helper->urldispatch('edit_password')?>/edit_password" >

          <div class="form-group">
            <label class="control-label col-lg-4"> Contraseña Actual </label>
            <div class="col-lg-8"><input type="password" name="password" id="password" class="form-control" /> </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-4"> Nueva contraseña </label>
            <div class="col-lg-8"><input type="password" name="new_password" id="new_password"  class="form-control"  /> </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-4"> Confirme contraseña </label>
            <div class="col-lg-8"><input type="password" name="confirm_password" id="confirm_password"  class="form-control" /></div>
          </div>

          <button type="submit" id="submit_btn" class="btn btn-primary"> Cambiar Contraseña </button>
        </form>

      </div>
    </div>
  </div>


</div>

<script>
 $(document).ready( function(){

   var alert = "<?=$alert?>";
   if(alert){
     $("#password").focus();
   }

   $("#submit_btn").click(function(event){

     var password          = $("#password").val();
     var new_password      = $("#new_password").val();
     var confirm_password  = $("#confirm_password").val();
     
     if(password == ""){
       $("#password").focus();
       return false;
     } else
     if(new_password == ""){
       $("#new_password").focus();
       return false;
     } else
     if(new_password.length < 6){
       event.preventDefault();
       bootbox.alert("La contraseña debe contener como minimo 6 caracteres.", function(){
         setTimeout(function() {
           $("#new_password").focus();
         }, 500);
       
       });
     } else
     if(confirm_password == ""){
       $("#confirm_password").focus();
       return false;
     } else
     if(new_password != confirm_password){
       event.preventDefault();
       bootbox.alert("Las contraseñas ingresadas no coinciden, verifique la información ingresada.", function(){
         setTimeout(function() {
           $("#new_password").focus(); 
         }, 500);
        
       });
     }



   });

   //hide alert after of 5 seconds
   setTimeout(function() {
    $(".alert").animate({opacity:"hide"});
   }, 5000);
 
 });
</script>
