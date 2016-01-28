<!-- edit Category View -->
<div class="container m-top-20">

  <div class="col-lg-12 row"> 
    <div class="panel panel-default">
      <div class="panel-body">
        <span class="glyphicon glyphicon-circle-arrow-up"></span>&nbsp;
        <span class="text text-danger"><strong>Añadir</strong></span>
        <span class="glyphicon glyphicon-arrow-right"></span>
        <span class="text text-info"><strong>Nueva Categoria</strong></span>
      </div>
    </div>
  </div>

  <div class="col-lg-8 row m-top-10">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title"> Añadir nueva Categoria </div>
      </div>
      <div class="panel-body">
        <form action="<?$helper->urldispatch('addCategories')?>/insertCategory" method="POST"  class="form-horizontal">
          <div>
            <p class="text-danger"><small>* Todos los campos son requeridosa</small></p>
            <hr></hr>
          </div>
         
          <div class="form-group">
            <label class="control-label col-lg-3">Nombre Categoria: </label>
            <div class="col-lg-8">
              <input type="text" name="category" id="category" class="form-control" >
            </div>
          </div>


          <button type="submit" id="submit_btn" class="btn btn-primary"> Añadir Categoria </button>
          <a href="<?$helper->urldispatch('admin')?>" type="button"  class="btn btn-default"> Cancelar </a>
        </form>
      </div>
    </div>
  </div>
</div>

<script>


$(document).ready( function(){
   
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
