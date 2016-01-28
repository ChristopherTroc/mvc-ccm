<?
class UpdateWeb_Controller extends TinyMVC_Controller {
  
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
    $web = $this->model_articles->getWeb();

    //Format text before display
    //$web[aboutme] = str_replace("<br>","\n",$web[aboutme]); 

    //Alert msg. about insert process.
    if($_GET[success])  $this->view->assign('success', "Los campos web han sido actualizada correctamente." );
    if($_GET[alert])    $this->view->assign('alert', "Hubo un error al actualizar los campos web, porfavor intente nuevamente.");

    $this->view->assign('stylesheets', array($this->helpers->load_css('admin')));
    $this->view->assign('javascripts', array($this->helpers->load_javascript()));
    $this->view->assign('title','Ver o actualizar Campos Web');
    $this->view->assign('helper',$this->helpers);
    $this->view->assign('web',$web);

    //Display dinamic alert
    if($_GET[success])  $this->view->display('success');
    if($_GET[alert])    $this->view->display('alert');

    $this->view->display('header');
    $this->view->display('menu');
    $this->view->display('editWebView');
    $this->view->display('footer');
      
    return;


   
  }


  function update(){
    $webFields = array('title'   => $_POST[title], 
                       'footer'  => $_POST[footer],
                       'aboutme' => $_POST[aboutme],
                       'link_facebook'  => $_POST[link_facebook],
                       'link_instagram' => $_POST[link_instagram],
                       'key_words'      => $_POST[key_words]
                     );

    //Format text before to update
    $webFields[aboutme] = str_replace("\n","<br>",$webFields[aboutme]); 

    if(!$webFields):
      $url = $this->helpers->to('admin');
      Header("Location:$url"); exit;
    endif;
  
    //call model
    $this->load->model("Articles_Model","model_articles");
    $result = $this->model_articles->updateWeb($webFields);

    $url = $this->helpers->to('updateWeb');
    if($result): Header("Location:$url?success=true"); exit; endif;

    Header("Location:$url?alert=true");
    return;

  }



}
