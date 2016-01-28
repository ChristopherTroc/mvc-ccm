<?
class Update_user_Controller extends TinyMVC_Controller {
  
  function __construct(){
    parent::__construct();
    $this->load->library('helpers');
    
    //Access security
    if(!$this->helpers->secure_session_start() OR $_SESSION[user_level] != 5) { 
      $home = $this->helpers->to('home');
      Header("Location: $home");
      exit;
     }
  }
  
  function index(){

    
    $this->view->assign('stylesheets', array($this->helpers->load_css('admin')));
    $this->view->assign('javascripts', array($this->helpers->load_javascript()));
    
    $this->view->assign('title','Actualizar Informacion Usuario');
    $this->view->assign('helper',$this->helpers);

    //call models
    $this->load->model("Users_Model","model_users");
    $users_list = $this->model_users->get_users_list();
    $this->view->assign('users_list', $users_list);

    $this->view->display('header');
    $this->view->display('menu');
    $this->view->display('users_list_view');
    $this->view->display('footer');
      
    return;
  }

  function display_form(){

    $url = $this->helpers->to('home');
    if(!$_GET[id]) Header("Location:$home");
   
    //call models
    $this->load->model("Users_Model","model_users");
    $user_info = $this->model_users->get_user_info($_GET[id]);
    $this->view->assign('user_info', $user_info);

    //Alert msg. about insert process.
    if($_GET[success]) $this->view->assign('success', "El Usuario ha sido actulizado correctamente." );
    if($_GET[alert])   $this->view->assign('alert', "Hubo un error al actulizar información de usuario, porfavor intente nuevamente.");
      
    $this->view->assign('stylesheets', array($this->helpers->load_css('admin')));
    $this->view->assign('javascripts', array($this->helpers->load_javascript()));
    
    $this->view->assign('title','Ver o actulizar Usuario');
    $this->view->assign('helper',$this->helpers);
  
    //Display dinamic alert
    if($_GET[success]) $this->view->display('success');
    if($_GET[alert])   $this->view->display('alert');

    $this->view->display('header');
    $this->view->display('menu');
    $this->view->display('update_user_view');
    $this->view->display('footer');
      
    return;
  
  }

  function update_user(){
    //Controller url 
    $url = $this->helpers->to('update_user');

    //create array with new user information
    $user_info = array(  'id'           => $_POST[id],
                         'name'         => $_POST[name],
                         'last_name'    => $_POST[last_name],
                         'email'        => $_POST[email] );

    //Call models
    $this->load->model("Users_Model","model_users");
    $verify_email = $this->model_users->verify_email($_POST[email]);
  
    //Check Email
    if(!$verify_email):

        $user_register = $this->model_users->get_user_info($_POST[id]);
        $new_password  = substr( md5(microtime()), 1, 6);
        $user_account  = array('id_login'     => $user_register[id_login],
                               'email'        => $_POST[email],
                               'new_password' => $new_password
                            );
        $query = $this->model_users->update_email_account($user_account);
        if($query)$this->helpers->send_notification_change_email($_POST[email],$new_password);
    endif;

    //check array
    if(!$user_info) return false;
    
    
    //Updare user info to database
    $this->model_users->update_user_info($user_info);

    //Success notification 
    Header("Location:$url/display_form?id=$user_info[id]&success=true");

   
    return;

  }

}//End class

