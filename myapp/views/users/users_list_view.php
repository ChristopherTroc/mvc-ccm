<!-- users list view -->
<div class="container m-top-20">

  <div class="col-lg-12 row"> 
    <div class="panel panel-default">
      <div class="panel-body">
        <span class="glyphicon glyphicon-circle-arrow-up"></span>&nbsp;
        <span class="text text-danger"><strong>Listado</strong></span>
        <span class="glyphicon glyphicon-arrow-right"></span>
        <span class="text text-info"><strong>Usuarios de sistema</strong></span>
      </div>
    </div>
  </div>

  <?if(!$users_list):?>
  <div class="col-lg-8 row">
    <div class="alert alert-info">
      <p>No hay usuarios en sistema.</p>
    </div>
  </div>
  <?endif?>

  <div class="col-lg-8 row">
    <div class="list-group">
    <?foreach($users_list AS $user):?>
     <a class="list-group-item" href="<?$helper->urldispatch('update_user')?>/display_form?id=<?=$user[id]?>" > <?=$user[name]." ".$user[last_name]?> </a>
    <?endforeach?>
    </div>
  </div>

</div>
