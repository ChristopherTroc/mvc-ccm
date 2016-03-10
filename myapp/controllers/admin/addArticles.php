<?
class AddArticles_Controller extends TinyMVC_Controller {
  
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
    if($_GET[success]) $this->view->assign('success', "La fotografia ha sido agregada." );
    if($_GET[alert])   $this->view->assign('alert', "Upss Hubo un error al intentar subir tu fotografia, intenta nuevamente.");
    if($_GET[exists])  $this->view->assign('alert', "Este titulo de fotografia  ya existe en la base de datos, favor verifique esta información.");
      
    $this->view->assign('stylesheets', array($this->helpers->load_css('admin')));
    $this->view->assign('javascripts', array($this->helpers->load_javascript(), $this->helpers->load_javascript('file-style')));
    
    $this->view->assign('title','Agregar Fotografia');
    $this->view->assign('helper',$this->helpers);
    $this->view->assign('categories',$categories);
  
    //Display dinamic alert
    if($_GET[success]) $this->view->display('success');
    if($_GET[alert])   $this->view->display('alert');
    if($_GET[exists])   $this->view->display('alert');
    $this->view->display('header');
    $this->view->display('menu');
    $this->view->display('addArticleView');
    $this->view->display('footer');
      
    return;
  }


  function insertArticle(){
    //Get vars
    $article = array('category_id' => $_POST[category],
                     'title'       => $_POST[title],
                     'date'        => $_POST['date'],
                     'description' => $_POST[description],
                     'img'         => $this->helpers->clean_spaces($_FILES['img']['name']),
                     'url'         => $_POST[url],
                     'file_tmp'    => $_FILES['img']['tmp_name']
                   );

    //Validate
    if(!$article OR !$article[category_id] OR (!$article[img] AND !$article[url]) ) return false;
    if(!$article[url] AND !$this->helpers->check_extension($article[img], array('.jpg','.jpeg','.JPG', '.png'))) return false;
     
    //call model
    $this->load->model("Articles_Model","model_articles");
   
    //Insert article on database
    $result = $this->model_articles->insertArticle($article);

    //Controller url 
    $url = $this->helpers->to('addArticles');

    //if article already exists on database
    if($result === 'on_database'){ 
       Header("Location:$url?exists=true"); exit; 
    }
    //if ERROR
    if(!$result){ 
       Header("Location:$url?error=true"); exit; 
    }

    //Save image
    if(!$_POST[url]){ $this->save_image_process($article); }

    //Success notification 
    Header("Location:$url?success=true");
    return;

  }

  private function save_image_process($article){
    //call model
    $this->load->model("Articles_Model","model_articles");
    $categories = $this->model_articles->getCategories();

    foreach($categories AS $category):
      if($category[id] == $article[category_id]){ $thisCategory = $category[category]; break; }
    endforeach;

    if(!$_POST[url]){
      //Create image 771px width
      $this->helpers->create_image($article[file_tmp],"./myapp/files/$thisCategory/$article[img]",771);
      //Create image thumb 100px width
      $this->helpers->create_image($article[file_tmp],"./myapp/files/$thisCategory/thumb_$article[img]",64);
    }

  }
 
  

}
