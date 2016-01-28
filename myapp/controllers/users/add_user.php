<?
class Add_user_Controller extends TinyMVC_Controller {
  
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
    //Alert msg. about insert process.
    if($_GET[success]) $this->view->assign('success', "El Usuario ha sido ingresado correctamente. Sera notificado a traves de un e-mail." );
    if($_GET[alert])   $this->view->assign('alert', "Hubo un error al ingresar Usuario, porfavor intente nuevamente.");
    if($_GET[exists])  $this->view->assign('alert', "Este Usuario ya existe en la base de datos, favor vreifique esta información.");
      
    $this->view->assign('stylesheets', array($this->helpers->load_css('admin')));
    $this->view->assign('javascripts', array($this->helpers->load_javascript()));
    
    $this->view->assign('title','Agregar Usuario');
    $this->view->assign('helper',$this->helpers);
  
    //Display dinamic alert
    if($_GET[success]) $this->view->display('success');
    if($_GET[alert])   $this->view->display('alert');
    if($_GET[exists])   $this->view->display('alert');
    $this->view->display('header');
    $this->view->display('menu');
    $this->view->display('add_user_view');
    $this->view->display('footer');
      
    return;
  }


  function insert_user(){
    //Controller url 
    $url = $this->helpers->to('add_user');

    //extract vars
    $name      = $_POST[name];
    $last_name = $_POST[last_name];
    $email     = $_POST[email];

    //call models
    $this->load->model("Users_Model","model_users");
    
    //make a user on database
    $user = $this->model_users->new_user($email,$level=1);
    
    //if user already exists on database
    if($user == 'already_exists'): Header("Location:$url?exists=true"); exit; endif;
  
    //create array with new user information
    $user_array = array( 'id_login'     => $user[id],
                         'name'         => $name,
                         'last_name'    => $last_name,
                         'email'        => $email );
    

    //Insert user info to database
    $this->model_users->insert_user_info($user_array);

    //notificate administrator company by email, (Use Php mailer)
    $this->helpers->send_notification_user($user);

    //Success notification 
    Header("Location:$url?success=true");

    return;

  }


}//End class
?>
