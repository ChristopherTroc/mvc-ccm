<!-- List Article View -->
<div class="container m-top-20">

  <div class="col-lg-12 row"> 
    <div class="panel panel-default">
      <div class="panel-body">
        <span class="glyphicon glyphicon-edit"></span>&nbsp;
        <span class="text text-danger"><strong>Ver o Actualizar</strong></span>
        <span class="glyphicon glyphicon-arrow-right"></span>
        <span class="text text-info"><strong>Articulos</strong></span>
      </div>
    </div>
  </div>

  <div class="col-lg-12 row">
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       Para cambiar el orden de los articulos, pincha y arrastra los articulos a la posición que deseas.
    </div>
  </div>
  
  <div class="col-lg-8 row m-top-10">
    
    <?foreach($categories AS $category):?>
      <h4 class="m-top-20 uppercase"><span class="glyphicon glyphicon-tag"></span>&nbsp;<?=$category[category]?></h4><hr>

      <ul class="media-list articles">
        <?if(!$articles[$category[category]]){?> <p class="text text-info"> No hay articulos en esta categoria.</p><?}?>

        <?foreach($articles[$category[category]] AS $article ):?>
        <li class="media" id="article-<?=$article[id]?>" >
          <div class="col-lg-2">
            <input class="front-radio" type="radio" name="front-<?=$category[id]?>" value="<?=$article[id]?>"<?if($category[idFront] == $article[id]){?>checked<?}?> />
          </div>
          <div class="media-left">
            <?if($article[img]){?>
            <img src="<?$helper->urldispatch(files)?><?=$category[category]?>/thumb_<?=$article[img]?>" />
            <?} else {?>
            <iframe class="embed-responsive-item" src="<?=$article[url]?>" width="64" height="41" ></iframe>
            <?}?>
          </div>
          <div class="media-body">
            <div class="media-heading">
              <div class="btn-group btn-group-xs pull-right" role="group">
                <button type="button" class="btn btn-default" onClick="editArticle(<?=$article[id]?>)" > <span class="glyphicon glyphicon-edit"></span>&nbsp;Editar </button>
                <button type="button"  class="btn btn-danger" onClick="deleteArticle(<?=$article[id]?>,'<?=$article[title]?>')" > <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Borrar </button>
              </div>
            </div>
            <h4><?=$article[title]?></h4>
          </div>
          <hr>
        </li>
        <?endforeach;?>
      </ul>
    <?endforeach;?>

    <div class="msg"></div>
  </div>



</div>

<script type="text/javascript">

//Delete article function
function deleteArticle(id_article, title_article){
  bootbox.confirm("Estas seguro(a) que deseas eliminar el articulo: "+title_article ,function(result){
    if(result == true){ 
      var url = '<?$helper->urldispatch(updateArticles)?>/deleteArticle?id='+id_article;
      $(location).attr('href',url);
    }
  });
}

//Edit article function
function editArticle(id_article){
      var url = '<?$helper->urldispatch(updateArticles)?>/editArticle?id='+id_article;
      $(location).attr('href',url);
}

$(document).ready(function(){

  //Order list drop ajax
  $("ul.articles").sortable({ opacity: 0.6, 
                              cursor: 'move', 
                              update: function() {
                                var order = $(this).sortable("serialize");
                                $.post("<?$helper->urldispatch(updateArticles)?>/order", order, function(response){
                                  $.growl({ message: 'El orden de los articulos ha sido actualizado, para ver los cambios refresca el sitio web.' },{
                                            type: 'success'
                                          });
                                });
                              }
  });

  $(".front-radio").click(function(){
    var url= "<?$helper->urldispatch('updateFront')?>";
   
    $.ajax({
            type:    "POST",
            url:     url,
            data:    { idCategory:+$(this).attr("name").substr(6), idArticle:+$(this).val() },
            success: function(data){
              
            //for debug
            //alert(data); return;
              if(data == 1){
                 $.growl({ message: 'La portada de la Categoria ha sido actualizada, para ver los cambios refresca el sitio web.' },{
                           type: 'success'
                 });
              }
            }//End success function 

    });//End Ajax function

  }); //End click function 

  //hide alert after of 5 seconds
   setTimeout(function() {
    $(".alert").animate({opacity:"hide"});
   }, 5000);

}); //End Ready
</script>
