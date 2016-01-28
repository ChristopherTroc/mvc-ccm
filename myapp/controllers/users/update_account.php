<? 
class Update_account_Controller extends TinyMVC_Controller {
  
  function __construct(){
    
    parent::__construct();
    $this->load->library('helpers');
    
    //Acces security
    if(!$this->helpers->secure_session_start()):
      $home = $this->helpers->to("home");
      Header("Location:$home");
      exit;
    endif;
  }
  
  function index(){
 
    $home = $this->helpers->to('home');
    
    switch($_GET[alert]){
      case "empty_fields":
        $alert = "Uno o mas campos estan vacios verifica la informacion ingresada.";
        break;
      case "error_password":
        $alert = "El password ingresado no es valido, verifique la información.";
        break;
      }

    $this->view->assign('alert', $alert);
    $this->view->assign('stylesheets', array($this->helpers->load_css('admin')));
    $this->view->assign('javascripts', array($this->helpers->load_javascript()));
    $this->view->assign('title','Cambiar contraseña');
    $this->view->assign('helper',$this->helpers);
    $this->view->display('header');
    $this->view->display('menu');
    if($_GET[alert]) $this->view->display('alert');
    $this->view->display('edit_password_view');
    $this->view->display('footer');

  }

  function edit_password(){
    
    $url  = $this->helpers->to('edit_password');
    $home = $this->helpers->to('home');
    $password = $_POST[password];
    $new_password = $_POST[new_password];
    

    if(!$password OR !$new_password):
      Header("Location:$url?alert=empty_fields"); 
      return false; 
    endif;
    
    $this->load->model('Users_Model','users');
    $user = $this->users->verify_login($_SESSION[user_login], $password);
    
    if(!$user):
      Header("Location:$url?alert=error_password"); 
      return false; 
    endif;

    $update_pass = $this->users->update_password($new_password,$_SESSION[login_id]);
   
    if($update_pass):
      Header("Location:$home?success=true");
      return true;
    endif;


    Header("Location:$url?alert=error_update"); 
    return false;

    
  }



}
