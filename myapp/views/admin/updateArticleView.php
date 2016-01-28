<!-- Update  Article View -->
<div class="container m-top-20">

  <div class="col-lg-12 row"> 
    <div class="panel panel-default">
      <div class="panel-body">
        <span class="glyphicon glyphicon-circle-arrow-up"></span>&nbsp;
        <span class="text text-danger"><strong>Editar</strong></span>
        <span class="glyphicon glyphicon-arrow-right"></span>
        <span class="text text-info"><strong>Articulo</strong></span>
      </div>
    </div>
  </div>

  <div class="col-lg-8 row m-top-10">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title"> Editar Articulo </div>
      </div>
      <div class="panel-body">
        <form action="<?$helper->urldispatch('updateArticles')?>/updateArticle" method="POST"  class="form-horizontal" enctype="multipart/form-data">
          <div>
            <p class="text-danger"><small>* Todos los campos son requeridos</small></p>
            <hr></hr>
          </div>
          
          <div class="form-group">
            <label class="control-label col-lg-3">Categoria del Articulo: </label>
            <div class="col-lg-8">
              <select name="category" id="category" class="form-control">
                <option value="" > Selecciona una categoria
                <?foreach($categories AS $category):?>
                <option value="<?=$category[id]?>" <?if($article[id_category] == $category[id]){ $categoryName = $category[category]; ?> selected="selected" <?}?>  ><?=$category[category]?> </option>
                <?endforeach;?>
              </select>
            </div>
          </div>  
  

          <div class="form-group">
            <label class="control-label col-lg-3">Titulo del Articulo: </label>
            <div class="col-lg-8">
              <input type="text" name="title" id="title" value="<?=$article[title]?>" class="form-control" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">Fecha: </label>
            <div class="col-lg-8">
              <input type="text" name="date" id="date" value="<?=$article[date]?>" placeholder="por ejemplo: 2014" class="form-control"   />
            </div>
          </div>
          
          <?if($article[img]){?>                    
          <div class="form-group">
            <label class="control-label col-lg-3">Imagen: </label>
            <div class="col-lg-8" style="display:none;" id="upload" >
              <input type="file" name="img" id="img" class="form-control" >
            </div>
            <div class="control-label col-lg-8" id="file-image"  >
             <span class="input-group">
               <span class="input-group-addon">
                 <a href="<?$helper->urldispatch("files")?><?=$categoryName?>/<?=$article[img]?>"  data-toggle="lightbox" ><span class="glyphicon glyphicon-eye-open"></span></a>
               </span>
               <input type="text" class="form-control" readonly  value="<?=$article[img]?>" >
               <span class="input-group-btn">
                 <button type="button" class="btn btn-default btn-danger" onclick="display_upload('upload','file-image');" >
                   <span class="glyphicon glyphicon-edit"></span>
                 </button>
               </span>
             </span>
            </div>
          </div>
          <?}else{?>
          <div class="form-group">
            <label class="control-label col-lg-3">Url del video (youtube,vimeo): </label>
            <div class="col-lg-8">
              <input name="url" type="text" value="<?=$article[url]?>" id="url" class="form-control" >
            </div>
          </div>
          <?}?>
          <div class="form-group">
            <label class="control-label col-lg-3">Descripción: </label>
            <div class="col-lg-8">
              <textarea name="description" id="description"  class="form-control" placeholder="Campo Opcional!" > <?=$article[description]?></textarea>
            </div>
          </div>

          <input type="hidden" name="id" value="<?=$article[id]?>" >
          <button type="submit" id="submit_btn" class="btn btn-primary"> Actualizar Articulo </button>
          <a href="<?$helper->urldispatch('updateArticles')?>" type="button"  class="btn btn-default"> Cancelar </a>
        </form>
      </div>
    </div>
  </div>
</div>

<script>


function display_upload(box_upload,box){

            bootbox.confirm("¿Estas seguro que deseas reemplazar el archivo existente ?", function(result) {
              if(result == true){
                  $("#"+box).hide("fast");
                  $("#"+box_upload).show("slow");
                  }
              });

}

$(document).ready( function(){

  $(":file").filestyle({ buttonText: "&nbsp;Archivo", buttonBefore: true  });
      
  $("#submit_btn").click(function(){
     
     var category  = $("#category").val();
     var title     = $("#title").val();
     var date_     = $("#date").val();
     var img       = $("#img").val();
     var url       = $("#url").val();
     var fileExtension = ['jpg', 'jpeg', 'png'];
     
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
     <?if($article[img]){?>
     if($('#upload').is(':visible') && $.inArray(img.split('.').pop().toLowerCase(), fileExtension) == -1 ) {
        bootbox.alert("Debes subir una imagen, Los formtatos permitidos son: '.jpeg','.jpg', '.png'");
        return false;
     }
     <?}else{?>
     if(url == ""){
       $("#url").focus();
       return false;
     }  
     <?}?>
     
     return true;
   
   });

   //hide alert after of 5 seconds
   setTimeout(function() {
    $(".alert").animate({opacity:"hide"});
   }, 5000);
 
 });

$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
     event.preventDefault();
     $(this).ekkoLightbox();
 }); 

</script>
