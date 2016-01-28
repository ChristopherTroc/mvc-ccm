<div class="container m-top-20">

  <div class="row">
  <div class="col-lg-9">

  <div class="bs-glyphicons" role="menu">
    <ul class="bs-glyphicons-list">

      <?if($_SESSION[user_level]==5): // ROOT USER MENU?> 

      <a href="<?$helper->urldispatch("addCategories")?>" > 
        <li>
          <span class="glyphicon glyphicon-plus pre" ></span>
          <span class="glyphicon glyphicon-tag" ></span>
          <span class="glyphicon-class">Nueva Categoria</span>
        </li>
      </a>
      <a href="<?$helper->urldispatch("addArticles")?>" > 
        <li>
          <span class="glyphicon glyphicon-plus pre" ></span>
          <span class="glyphicon glyphicon-picture" ></span>
          <span class="glyphicon-class">Nuevo Articulo</span>
        </li>
      </a>
      <a href="<?$helper->urldispatch("updateWeb")?>" > 
        <li>
          <span class="glyphicon glyphicon-list-alt" ></span>
          <span class="glyphicon-class">Editar Campos Web</span>
        </li>
      </a>
      <a href="<?$helper->urldispatch("edit_password")?>">
        <li>
          <span class="glyphicon glyphicon-lock" ></span>
          <span class="glyphicon-class">Cambiar contraseña</span>
        </li>
      </a>
      <a href="<?$helper->urldispatch("destroy_session")?>">
        <li>
          <span class="glyphicon glyphicon-log-out" ></span>
          <span class="glyphicon-class">Cerrar Sesion</span>
        </li>
      </a>

      <?endif?>

      <?if($_SESSION[user_level]==1): // ALL USERS?> 

      <a href="<?$helper->urldispatch("addCategories")?>" > 
        <li>
          <span class="glyphicon glyphicon-plus pre" ></span>
          <span class="glyphicon glyphicon-tag" ></span>
          <span class="glyphicon-class">Nueva Categoria</span>
        </li>
      </a>
      <a href="<?$helper->urldispatch("addArticles")?>" > 
        <li>
          <span class="glyphicon glyphicon-plus pre" ></span>
          <span class="glyphicon glyphicon-picture" ></span>
          <span class="glyphicon-class">Nuevo Articulo</span>
        </li>
      </a>
      <a href="<?$helper->urldispatch("updateWeb")?>" > 
        <li>
          <span class="glyphicon glyphicon-list-alt" ></span>
          <span class="glyphicon-class">Editar Campos Web</span>
        </li>
      </a>
      <a href="<?$helper->urldispatch("edit_password")?>">
        <li>
          <span class="glyphicon glyphicon-lock" ></span>
          <span class="glyphicon-class">Cambiar contraseña</span>
        </li>
      </a>
      <a href="<?$helper->urldispatch("destroy_session")?>">
        <li>
          <span class="glyphicon glyphicon-log-out" ></span>
          <span class="glyphicon-class">Cerrar Sesion</span>
        </li>
      </a>


      <?endif?>
      

    </ul>
  </div>

  </div>
  </div>

</div>

<script>
$(document).ready(function(){

/*
  $.growl({
    message: "Check out my twitter account by clicking on   this Growl! <strong>Warning: This growl will take you away from this screen</strong>",
      url: "https://twitter.com/Mouse0270"
  },{
    url_target: '_self'
  }); */

$(document).ready(function(){
  setTimeout(function(){
    $(".alert").animate({opacity:"hide"});
  },5000 );

});

});
</script>
