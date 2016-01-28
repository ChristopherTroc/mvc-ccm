<?
class Admin_Controller extends TinyMVC_Controller {
  
  function index() {


     //echo "<h4>Sistema en actualizacion. !!! volvemos en 30 minutos.</h4> ";
     //exit;
    
    $this->helpers->secure_session_start();
    
    if($_SESSION['login_id']) { //if session start
      
       $this->view->assign('success',"Password actualizado.");
       $this->view->assign('stylesheets',array($this->helpers->load_css('admin')));
       $this->view->assign('javascripts',array($this->helpers->load_javascript(), $this->helpers->load_javascript('growl') ));
       $this->view->assign('title','Administrador CCM');
       $this->view->assign('helper',$this->helpers);
       $this->view->display('header');
       $this->view->display('menu');
       if($_GET[success]) $this->view->display('success');
       $this->view->display('home_view');
       $this->view->display('footer');

       exit;
    }
    

    $this->view->assign('success',"Password actualizado. Hemos enviado tu nuevo password a tu casilla de correo.");
    $this->view->assign('stylesheets',array($this->helpers->load_css('login')));
    $this->view->assign('javascripts',array($this->helpers->load_javascript()));
    $this->view->assign('title','Administrador CCM');
    $this->view->assign('helper',$this->helpers);
    $this->view->display('header');
    if($_GET[success]) $this->view->display('success');
    $this->view->display('login_view');
    $this->view->display('footer');
  
  }


  
}
?>
