<div class="container">
  <div class="navbar navbar-inverse navbar-fixed-top" rol="navigation">

<?if($_SESSION[user_level] == 5 ): // super user ?>
  <!-- menu bar -->
    <!-- dinamic button for mobile experience -->
    <div class="navbar-header">
      <button type="buttom" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Dropdown</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?$helper->urldispatch('home')?>" class="navbar-brand"><i class="glyphicon glyphicon-home"></i></a>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-upload"></span>&nbsp;Ingresos<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?$helper->urldispatch('addCategories')?>">Categoria </a></li>
            <li><a href="<?$helper->urldispatch('addArticles')?>">Articulo</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-edit"></span>&nbsp;Ver/Editar<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?$helper->urldispatch('updateCategories')?>">Categorias</a></li>
            <li><a href="<?$helper->urldispatch('updateArticles')?>">Articulos</a></li>
            <li><a href="<?$helper->urldispatch('updateWeb')?>">Campos WEB</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp;Usuarios <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?$helper->urldispatch('edit_password')?>">Cambiar mi contraseña</a></li>
            <li><a href="<?$helper->urldispatch('add_user')?>">Agregar Usuario a Sistema</a></li>
            <li><a href="<?$helper->urldispatch('update_user')?>">Ver o editar Usuarios</a></li>
            <li><a href="<?$helper->urldispatch('users_list')?>">Lista de Usuarios</a></li>
          </ul>
        </li>
       <!-- <li><a href="#"><span class="glyphicon glyphicon-cog"></span>&nbsp;Sistema</a></li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right p-right-20">
        <li> <a href="<?$helper->urldispatch('destroy_session')?>" ><span class="glyphicon glyphicon-log-out"></span>&nbsp;Salir</a></li>
      </ul>
    </div>
  

<?endif?>


<?if($_SESSION[user_level] == 1 ): // Users ?>

    <!-- dinamic button for mobile experience -->
    <div class="navbar-header">
      <button type="buttom" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Dropdown</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?$helper->urldispatch('home')?>" class="navbar-brand"><i class="glyphicon glyphicon-home"></i></a>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-upload"></span>&nbsp;Ingresos<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?$helper->urldispatch('addCategories')?>">Categoria </a></li>
            <li><a href="<?$helper->urldispatch('addArticles')?>">Articulo</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-edit"></span>&nbsp;Ver/Editar<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?$helper->urldispatch('updateCategories')?>">Categorias</a></li>
            <li><a href="<?$helper->urldispatch('updateArticles')?>">Articulos</a></li>
            <li><a href="<?$helper->urldispatch('updateWeb')?>">Campos WEB</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp;Mi Cuenta <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?$helper->urldispatch('edit_password')?>">Cambiar mi contraseña</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right p-right-20">
        <li> <a href="<?$helper->urldispatch('destroy_session')?>" ><span class="glyphicon glyphicon-log-out"></span>&nbsp;Salir</a></li>
      </ul>
    </div>
    
<?endif?>


 
  </div><!-- End nav -->
</div><!-- End container -->
