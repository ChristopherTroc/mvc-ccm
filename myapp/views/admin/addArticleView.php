<!-- add Article View -->
<div class="container m-top-20">

  <div class="col-lg-12 row"> 
    <div class="panel panel-default">
      <div class="panel-body">
        <span class="glyphicon glyphicon-circle-arrow-up"></span>&nbsp;
        <span class="text text-danger"><strong>Añadir</strong></span>
        <span class="glyphicon glyphicon-arrow-right"></span>
        <span class="text text-info"><strong>Fotografia</strong></span>
      </div>
    </div>
  </div>

  <div class="col-lg-8 row m-top-10">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title"> Añadir nueva Fotografia </div>
      </div>
      <div class="panel-body">
        <form action="<?$helper->urldispatch('addArticles')?>/insertArticle" method="POST"  class="form-horizontal" enctype="multipart/form-data">
          <div>
            <p class="text-danger"><small>* Todos los campos son requeridosa</small></p>
            <hr></hr>
          </div>
          
          <div class="form-group">
            <label class="control-label col-lg-3">Album de la Fotografia: </label>
            <div class="col-lg-8">
              <select name="category" id="category" class="form-control">
                <option value="" > Selecciona un Album
                <?foreach($categories AS $category):?>
                <option value="<?=$category[id]?>"><?=$category[category]?> </option>
                <?endforeach;?>
              </select>
            </div>
          </div>  
         

          <div class="form-group">
            <label class="control-label col-lg-3">Titulo del Articulo </label>
            <div class="col-lg-8">
              <input type="text" name="title" id="title" class="form-control" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">Fecha: </label>
            <div class="col-lg-8">
              <input type="date" name="date" id="date" placeholder="por ejemplo: 2014" class="form-control"   />
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3" >Tipo de Articulo</label>
              <div class="col-lg-8">
                Fotografia:&nbsp;<input type="radio" name="type-article" class="type-article" value="1" />
                Video:     &nbsp;<input type="radio" name="type-article" class="type-article" value="2" />
              </div>
          </div>  

          <div class="form-group" style="display:none" id="img-box">
            <label class="control-label col-lg-3">Imagen: </label>
            <div class="col-lg-8">
              <input name="img" type="file" id="img" class="form-control" >
            </div>
          </div>

          <div class="form-group" style="display:none" id="url-box">
            <label class="control-label col-lg-3">Url del video (youtube,vimeo): </label>
            <div class="col-lg-8">
              <input name="url" type="text" id="url" class="form-control" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">Descripción: </label>
            <div class="col-lg-8">
              <textarea name="description" id="description" class="form-control" placeholder="Campo Opcional!" ></textarea>
            </div>
          </div>


          <button type="submit" id="submit_btn" class="btn btn-primary"> Añadir Fotografia </button>
          <a href="<?$helper->urldispatch('admin')?>" type="button"  class="btn btn-default"> <i class="glyphicon glyphicon-arrow-left"></i> volver </a>
        </form>
      </div>
    </div>
  </div>
</div>

<script>


$(document).ready( function(){

  $(":file").filestyle({ buttonText: "&nbsp;Archivo", buttonBefore: true  });

  $("#submit_btn").click(function(){
     
     var category  = $("#category").val();
     var title     = $("#title").val();
     var date_     = $("#date").val();
     var img       = $("#img").val();
     var url       = $("#url").val();
     var fileExtension = ['jpg', 'jpeg', 'png'];
     var typeArticle  = $("input[name='type-article']:checked").val();

  
     if(category == ""){
       $("#category").focus();
       return false;
      } else
     if(title == ""){
       $("#title").focus();
       return false;
      } else 
     if(date_ == ""){
       $("#date").focus();
       return false;
     } else 
     if(typeArticle == 1){ //Img article 
          if($.inArray(img.split('.').pop().toLowerCase(), fileExtension) == -1 ) {
            bootbox.alert("Debes subir una imagen, Los formtatos permitidos son: '.jpeg','.jpg', '.png'");
            return false;
          } 
     } else 
     if(url == ""){
       $("#url").focus();
       return false;
      }
    
     
     return true;
   
  });

  $(".type-article").click(function(){
     var typeArticle  = $("input[name='type-article']:checked").val();
     if(typeArticle == 1){
       $("#img-box").show();
       $("#url-box").hide();
     } else {
       $("#url-box").show();
       $("#img-box").hide();
     }
  });

  //hide alert after of 5 seconds
  setTimeout(function() {
    $(".alert").animate({opacity:"hide"});
  }, 5000);
 
 });
</script>
