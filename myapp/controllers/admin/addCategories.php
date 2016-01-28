<?
class AddCategories_Controller extends TinyMVC_Controller {
  
  function __construct(){
    parent::__construct();
    $this->load->library('helpers');
    
    //Access security
    if(!$this->helpers->secure_session_start()) {
      $home = $this->helpers->to('home');
      Header("Location: $home");
      exit;
     }
  }

  //Observations:
  //Category = Album

  function index(){
    //Alert msg. about insert process.
    if($_GET[success]) $this->view->assign('success', "El Album ha sido creado correctamente." );
    if($_GET[alert])   $this->view->assign('alert', "Hubo un error al crear el Album, porfavor intente nuevamente.");
    if($_GET[exists])  $this->view->assign('alert', "Esta categoria ya existe en la base de datos, favor vreifique esta información.");
      
    $this->view->assign('stylesheets', array($this->helpers->load_css('admin')));
    $this->view->assign('javascripts', array($this->helpers->load_javascript()));
    
    $this->view->assign('title','Agregar Album');
    $this->view->assign('helper',$this->helpers);
  
    //Display dinamic alert
    if($_GET[success]) $this->view->display('success');
    if($_GET[alert])   $this->view->display('alert');
    if($_GET[exists])   $this->view->display('alert');
    $this->view->display('header');
    $this->view->display('menu');
    $this->view->display('addCategoryView');
    $this->view->display('footer');
      
    return;
  }


  function insertCategory(){

    //extract vars
    $category = $_POST[category];
    //call model
    $this->load->model("Articles_Model","model_articles");
    //Insert category on database
    $result = $this->model_articles->insertCategory($category);
    //Controller url 
    $url = $this->helpers->to('addCategories');

    //if category already exists on database
    if($result == 'on_database'){ 
       Header("Location:$url?exists=true"); exit; 
    }

    //Make dir category files
    mkdir("./myapp/files/$category");
    chmod("./myapp/files/$category", 0777);

    //Success notification 
    Header("Location:$url?success=true");

    return;

  }


  

}
