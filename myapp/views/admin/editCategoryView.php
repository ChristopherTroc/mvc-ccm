<!-- Edit Category View -->
<div class="container m-top-20">

  <div class="col-lg-12 row"> 
    <div class="panel panel-default">
      <div class="panel-body">
        <span class="glyphicon glyphicon-edit"></span>&nbsp;
        <span class="text text-danger"><strong>Editar</strong></span>
        <span class="glyphicon glyphicon-arrow-right"></span>
        <span class="text text-info"><strong>Editar Categoria</strong></span>
      </div>
    </div>
  </div>

  <div class="col-lg-8 row m-top-10">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title"> Editar Categoria </div>
      </div>
      <div class="panel-body">
        <div class="pull-right" id="delete"><button type="button" class="btn btn-sm btn-danger"> Eliminar </button></div>
        <form action="<?$helper->urldispatch('updateCategories')?>/update" method="POST"  class="form-horizontal">
          <div>
            <p class="text-danger"><small>* Todos los campos son requeridosa</small></p>
            <hr></hr>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">Nombre Categoria: </label>
            <div class="col-lg-8">
              <input type="text" name="category" id="category" value="<?=$category[category]?>" class="form-control" >
              <input type="hidden" name="id" value="<?=$category[id]?>" >
            </div>
          </div>


          <button type="submit" id="submit_btn" class="btn btn-primary"> Actualizar Categoria </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>


$(document).ready( function(){

   $("#delete").click(function(){
     bootbox.confirm("¿Estas seguro(a) que deseas eliminar la categoria <?=$category[category]?>?, Se borraran todos los articulos correspondientes a esta categoria.", function(result) {

       
       if(result == true){
          var url = '<?$helper->urldispatch(updateCategories)?>/deleteCategory?id=<?=$category[id]?>';
          $(location).attr('href',url);
       }


     }); 
   });

   $("#submit_btn").click(function(){
     
     var category = $("#category").val();
     
     if(category == ""){
       $("#category").focus();
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
