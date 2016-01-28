<!-- Edit Web fields View -->
<div class="container m-top-20">

  <div class="col-lg-12 row"> 
    <div class="panel panel-default">
      <div class="panel-body">
        <span class="glyphicon glyphicon-edit"></span>&nbsp;
        <span class="text text-danger"><strong>Editar</strong></span>
        <span class="glyphicon glyphicon-arrow-right"></span>
        <span class="text text-info"><strong>Campos Web</strong></span>
      </div>
    </div>
  </div>

  <div class="col-lg-8 row m-top-10">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title"> Editar campos Web </div>
      </div>
      <div class="panel-body">
        <form action="<?$helper->urldispatch('updateWeb')?>/update" method="POST"  class="form-horizontal">
          <div>
            <p class="text-danger"><small>* Todos los campos son requeridosa</small></p>
            <hr></hr>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">Titulo (texto logo): </label>
            <div class="col-lg-8">
              <input type="text" name="title" id="title" value="<?=$web[title]?>" class="form-control" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">Link Facebook: </label>
            <div class="col-lg-8">
              <input type="text" name="link_facebook" id="link_facebook" value="<?=$web[link_facebook]?>" class="form-control" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">Link Instagram: </label>
            <div class="col-lg-8">
              <input type="text" name="link_instagram" id="link_instagram" value="<?=$web[link_instagram]?>" class="form-control" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">Pie de Pagina: </label>
            <div class="col-lg-8">
              <input type="text" name="footer" id="footer_web" value="<?=$web[footer]?>" class="form-control" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">Sobre Mi: </label>
            <div class="col-lg-8">
              <textarea name="aboutme" id="aboutme" class="form-control"><?=$web[aboutme]?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">Palabras clave para la busqueda: </label>
            <div class="col-lg-8">
              <textarea name="key_words" id="key_words" class="form-control"><?=$web[key_words]?></textarea>
            </div>
          </div>



          <button type="submit" id="submit_btn" class="btn btn-primary"> Actualizar Campos </button>
          <a href="<?$helper->urldispatch(admin)?>" class="btn btn-default" >Canclear </a>
        </form>
      </div>
    </div>
  </div>
</div>

<script>


$(document).ready( function(){
  
  var aboutme    = $("#aboutme").val();
  aboutme_format = aboutme.replace(new RegExp("<br>","g"),"");
  $("#aboutme").val(aboutme_format);

   $("#submit_btn").click(function(){
     
     var title          = $("#title").val();
     var link_facebook  = $("#link_facebook").val();
     var link_instagram = $("#link_instagram").val();
     var footer         = $("#footer_web").val();
     var aboutme        = $("#aboutme").val();
     var key_words      = $("#key_words").val();
     
     if(title == ""){
       $("#title").focus();
       return false;
     } else 
     if(link_facebook == ""){
       $("#link_facebook").focus();
       return false;
     } else 
     if(link_instagram == ""){
       $("#link_instagram").focus();
       return false;
     } else 
     if(footer == ""){
       $("#footer_web").focus();
       return false;
     } else  
     if(aboutme == ""){
       $("#aboutme").focus();
       return false;
     } else
     if(key_words == ""){
       $("#key_words").focus();
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
