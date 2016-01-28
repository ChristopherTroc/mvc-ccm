<?
class UpdateCategories_Controller extends TinyMVC_Controller {
  
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

  function index(){


    //call model
    $this->load->model("Articles_Model","model_articles");
    $categories = $this->model_articles->getCategories();

    //Alert msg. about insert process.
    if($_GET[success])  $this->view->assign('success', "La categoria ha sido actualizada correctamente." );
    if($_GET['delete']) $this->view->assign('success', "La categoria ha sido eliminada." );
    if($_GET[alert])    $this->view->assign('alert', "Hubo un error al actualizar la categoria, porfavor intente nuevamente.");
    $this->view->assign('stylesheets', array($this->helpers->load_css('admin')));
    $this->view->assign('javascripts', array($this->helpers->load_javascript()));
    $this->view->assign('title','Ver o actualizar Album');
    $this->view->assign('helper',$this->helpers);
    $this->view->assign('categories',$categories);

    //Display dinamic alert
    if($_GET[success])  $this->view->display('success');
    if($_GET['delete']) $this->view->display('success');
    if($_GET[alert])    $this->view->display('alert');
    $this->view->display('header');
    $this->view->display('menu');
    $this->view->display('listCategoriesView');
    $this->view->display('footer');
      
    return;


   
  }

  function updateCategory(){
    
    $id_category = $_GET[id];

    if(!$id_category):
      $admin_panel = $this->helpers->to('admin');
      Header("Location:$admin_panel"); exit;
    endif;
   
    //call model
    $this->load->model("Articles_Model","model_articles");
    $category = $this->model_articles->getSingleCategory($id_category);
 
    $this->view->assign('stylesheets', array($this->helpers->load_css('admin')));
    $this->view->assign('javascripts', array($this->helpers->load_javascript()));
    $this->view->assign('title','Editar Album');
    $this->view->assign('helper',$this->helpers);
    $this->view->assign('category',$category);
  
    $this->view->display('header');
    $this->view->display('menu');
    $this->view->display('editCategoryView');
    $this->view->display('footer');
      
    return;
    
  }

  function update(){
    if(!$_POST[category]) exit;
    $category = array('id' => $_POST[id], 'category' => $_POST[category]);

    //call model
    $this->load->model("Articles_Model","model_articles");
    $current_category = $this->model_articles->getSingleCategory($category[id]);
    $result = $this->model_articles->updateCategory($category);

    //Rename folder
    if($result){
      rename("./myapp/files/$current_category[category]","./myapp/files/$category[category]");
    }

    $url = $this->helpers->to('updateCategories');
    if($result): Header("Location:$url?success=true"); exit; endif;

    Header("Location:$url?alert=true");
    return;

  }

  function deleteCategory(){
    if(!$_GET[id]) exit;
    $this->load->model("Articles_Model","model_articles");
    $category = $this->model_articles->getSingleCategory($_GET[id]);
    $delete   = $this->model_articles->deleteCategory($_GET[id]);
    $dir = "./myapp/files/$category[category]";
    $this->helpers->deleteDirectory($dir);
    
    $url = $this->helpers->to('updateCategories');
    Header("Location:$url?delete=true");
    
  }

  function updateFront(){
    $front = array('idCategory' => $_POST[idCategory],'idArticle' => $_POST[idArticle]);
    $this->load->model('Articles_Model','model_articles');
    $update =  $this->model_articles->updateFrontCategory($front);
    if($update){ echo "1"; } else { echo "0"; }
  }



}
