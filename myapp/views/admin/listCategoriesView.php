<!-- List Article View -->
<div class="container m-top-20">

  <div class="col-lg-12 row"> 
    <div class="panel panel-default">
      <div class="panel-body">
        <span class="glyphicon glyphicon-edit"></span>&nbsp;
        <span class="text text-danger"><strong>Ver o Actualizar</strong></span>
        <span class="glyphicon glyphicon-arrow-right"></span>
        <span class="text text-info"><strong>Categorias</strong></span>
      </div>
    </div>
  </div>

  <div class="col-lg-8 row m-top-10">
    <div class="text-small text-info">* Para editar, hacer click en la categoria.</div>
    <div class="list-group">
      <?foreach($categories AS $category):?>
      <a href="<?$helper->urldispatch('updateCategories')?>/updateCategory?id=<?=$category[id]?>" class="list-group-item"><span class="glyphicon glyphicon-tag"></span>&nbsp; <?=$category[category]?></a>
      <?endforeach;?>
    </div>
  </div>

</div>
