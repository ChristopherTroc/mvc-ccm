<?
class UpdateArticles_Controller extends TinyMVC_Controller {
  
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
    $this->load->model('Articles_Model','model_articles');
    $categories = $this->model_articles->getCategories();

    foreach($categories AS $cat):
      $articles[$cat[category]] = $this->model_articles->getArticles($cat[id]);
    endforeach;

    //Alert msg. about update process.
    if($_GET[success]) $this->view->assign('success', "Actualizado!" );
    if($_GET[alert])   $this->view->assign('alert', "Hubo un error al actualizar el Articulo, intente nuevamente.");
    if($_GET[exists])  $this->view->assign('alert', "Este titulo de Articulo  ya existe en la base de datos, favor verifique esta información.");

    $this->view->assign('stylesheets', array($this->helpers->load_css('admin')));
    $this->view->assign('javascripts', array($this->helpers->load_javascript(), $this->helpers->load_javascript('ui'), $this->helpers->load_javascript('growl')));
    $this->view->assign('title','Lista de articulos');
    $this->view->assign('helper',$this->helpers);
    $this->view->assign('categories',$categories);
    $this->view->assign('articles',$articles);

    //Display dinamic alert
    if($_GET[success]) $this->view->display('success');
    if($_GET[alert])   $this->view->display('alert');
    if($_GET[exists])   $this->view->display('alert');

    $this->view->display('header');
    $this->view->display('menu');
    $this->view->display('listArticlesView');
    $this->view->display('footer');
      
    return;
  }

  function order(){
    $articles_order = $_POST[article];
    $this->load->model('Articles_Model','model_articles');
    $this->model_articles->orderArticles($articles_order);
  }


  function deleteArticle(){
    $id_article = $_GET[id];
    if(!$id_article) exit;
    
    $this->load->model('Articles_Model','model_articles');

    $article  = $this->model_articles->getSingleArticle($id_article);
    $category = $this->model_articles->getSingleCategory($article[id_category]);


    //Delete img process
    if($article[img]){
      $route_img   = "./myapp/files/$category[category]/$article[img]";
      $route_thumb = "./myapp/files/$category[category]/thumb_$article[img]";
     
      //Delete files
      chown($route_thumb, 666);
      chown($route_img, 666);
      if(!unlink($route_thumb)) echo "Error al borrar thumb";
      if(!unlink($route_img)) echo "Error al borrar img";
    }

    //Delete article db
    $this->model_articles->deleteArticle($id_article);
    
    //Redirect to index 
    $url = $this->helpers->to('updateArticles');
    Header("Location:$url"); exit;

  }

  function editArticle(){
    $id_article = $_GET[id];
    if(!$id_article) exit;

    //call model
    $this->load->model("Articles_Model","model_articles");
    $categories = $this->model_articles->getCategories();
    $article    = $this->model_articles->getSingleArticle($id_article);

      
    $this->view->assign('stylesheets', array($this->helpers->load_css('admin'), 
                                             $this->helpers->load_css('lightbox'))
                                           );
    $this->view->assign('javascripts', array($this->helpers->load_javascript(), 
                                             $this->helpers->load_javascript('file-style'), 
                                             $this->helpers->load_javascript('lightbox'))
                                           );
    
    $this->view->assign('title','Agregar Articulo');
    $this->view->assign('helper',$this->helpers);
    $this->view->assign('categories',$categories);
    $this->view->assign('article',$article);
  

    $this->view->display('header');
    $this->view->display('menu');
    $this->view->display('updateArticleView');
    $this->view->display('footer');
      
    return;
  }


  function updateArticle(){

    //Get vars
    $article = array('id'          => $_POST[id],
                     'category_id' => $_POST[category],
                     'title'       => $_POST[title],
                     'date'        => $_POST['date'],
                     'description' => $_POST[description],
                     'img'         => $this->helpers->clean_spaces($_FILES['img']['name']),
                     'url'         => $_POST[url],
                     'file_tmp'    => $_FILES['img']['tmp_name']
                    );


    //Validate
    if(!$article OR !$article[category_id] OR !$article[id]) exit;

    //call model
    $this->load->model("Articles_Model","model_articles");

    //call old article
    $old_article  = $this->model_articles->getSingleArticle($article[id]);
   
    //update article on database
    $result = $this->model_articles->updateArticle($article);

    //Controller url 
    $url = $this->helpers->to('updateArticles');

    //if article already exists on database
    if($result === "on_database"){
       Header("Location:$url?exists=true"); exit; 
    }
    //if error 
    if(!$result){
      Header("Location:$url?error=true"); exit; 
    }
  
     
    //Save image process
    if($article[img] AND $article[img] != ""):
      if(!$this->helpers->check_extension($article[img], array('.jpg','.jpeg', '.png'))) exit;
      $this->update_image_process($article,$old_article);
    endif;
  
    //Check if change category, if change move img 
    if($old_article[id_category] != $article[category_id]):
      $this->move_file($old_article,$article);
    endif;
    

    //Success notification 
    Header("Location:$url?success=true");
    return;

  }

  private function update_image_process($new_article,$old_article){
    //call model
    $this->load->model("Articles_Model","model_articles");
    $categories  = $this->model_articles->getCategories();

    foreach($categories AS $category):
      if($category[id] == $old_article[id_category]){ $oldCategory = $category[category]; break; }
    endforeach;
    foreach($categories AS $category):
      if($category[id] == $new_article[category_id]){ $newCategory = $category[category]; break; }
    endforeach;
    
      
    //Delete before img
    $route_img   = "./myapp/files/$oldCategory/$old_article[img]";
    $route_thumb = "./myapp/files/$oldCategory/thumb_$old_article[img]";

    chown($route_thumb, 666);
    chown($route_img, 666);
    unlink($route_thumb);
    unlink($route_img);

    //Create image 771px width
    $this->helpers->create_image($new_article[file_tmp],"./myapp/files/$newCategory/$new_article[img]",771);
    //Create image thumb 64px width
    $this->helpers->create_image($new_article[file_tmp],"./myapp/files/$newCategory/thumb_$new_article[img]",64);
  
  }

  private function move_file($old_article,$new_article){
    //call model
    $this->load->model("Articles_Model","model_articles");
    $categories  = $this->model_articles->getCategories();

    foreach($categories AS $category):
      if($category[id] == $new_article[category_id]){ $newCategory = $category[category]; break; }
    endforeach;

    foreach($categories AS $category):
      if($category[id] == $old_article[id_category]){ $oldCategory = $category[category]; break; }
    endforeach;

    $old_route_img   = "./myapp/files/$oldCategory/$old_article[img]";
    $old_route_thumb = "./myapp/files/$oldCategory/thumb_$old_article[img]";
    $new_route_img   = "./myapp/files/$newCategory/$old_article[img]";
    $new_route_thumb = "./myapp/files/$newCategory/thumb_$old_article[img]";

    chown($old_route_thumb, 666);
    chown($old_route_img, 666);
    rename($old_route_thumb,$new_route_thumb);
    rename($old_route_img,$new_route_img);
  }
}
