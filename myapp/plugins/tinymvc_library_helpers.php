<? 
class TinyMVC_Library_Helpers {

  var $server_name;
  var $folder_name;
  var $base_url;

  function __construct(){
    //set routes
   $this->server_name = $_SERVER['SERVER_NAME'];
   $this->folder_name = "mvc-ccm";
   $this->base_url = "http://$this->server_name/$this->folder_name";
   //$this->base_url = "http://$this->server_name";
  

  }


//**************************************************************   Url functions ************************************************************************************

  function to($case,$data){
    switch ($case){
     case 'base_url': return "$this->base_url";
     case 'css' : return "$this->base_url/myapp/views/assets/css/";
     case 'js'  : return "$this->base_url/myapp/views/assets/js/";
    
     //Folders documents
     case 'files':   return "$this->base_url/myapp/files/"; 
     
     //Folder images
     case 'images' : return "$this->base_url/myapp/views/assets/images/";

     //web
     case 'index':  return "$this->base_url/web";
     case 'album':  return "$this->base_url/web/viewAlbum";

     //Administrator
     case 'admin'                  : return "$this->base_url/admin";
     case 'home'                   : return "$this->base_url/admin";
     case 'addCategories'          : return "$this->base_url/addCategories";
     case 'addArticles'            : return "$this->base_url/addArticles";
     case 'updateCategories'       : return "$this->base_url/updateCategories";
     case 'updateArticles'         : return "$this->base_url/updateArticles";
     case 'updateFront'            : return "$this->base_url/updateCategories/updateFront";
     case 'updateWeb'              : return "$this->base_url/updateWeb";
    
     //Users Info
     case 'add_user'               : return "$this->base_url/add_user";
     case 'update_user'            : return "$this->base_url/update_user";
     case 'users_list'             : return "$this->base_url/update_user";

     //Active User account controller
     case 'activate_user_account' : return "$this->base_url/activation_account";
     case 'edit_password'         : return "$this->base_url/update_account";
     
     //login users
     case 'destroy_session'     : return "$this->base_url/login/destroy_session";
     case 'login'               : return "$this->base_url/login";
     case 'recovery_password'   : return "$this->base_url/login/recovery_password";
     case 'renew_password'      : return "$this->base_url/login/renew_password";


    }
  }
  
  //Helper url dispatch
  function urldispatch($case,$data=""){
   echo $this->to($case,$data);
  }
  
  function load_javascript($case = 'default') {
    switch($case){
    case 'default'            : return "<script src='$this->base_url/myapp/views/assets/js/jquery.js'></script>
                                        <script src='$this->base_url/myapp/views/assets/js/bootstrap.min.js'></script>
                                        <script src='$this->base_url/myapp/views/assets/js/bootbox.min.js'></script>\n";
    
    //Web view librarys
    case 'contactMe'          : return "<script src='$this->base_url/myapp/views/assets/js/contact_me.js'></script>\n";
    case 'validation'         : return "<script src='$this->base_url/myapp/views/assets/js/jqBootstrapValidation.js'></script>\n";

    case 'web_default'        : return "<script src='$this->base_url/myapp/views/assets/js/jquery.js'></script>
                                        <script src='$this->base_url/myapp/views/assets/js/wow.min.js'></script>\n
                                        <script src='$this->base_url/myapp/views/assets/js/bootstrap.min.js'></script>\n
                                        <script src='$this->base_url/myapp/views/assets/js/mobile/touchSwipe.min.js'></script>\n
                                        <script src='$this->base_url/myapp/views/assets/js/respond/respond.js'></script>\n
                                        <script src='$this->base_url/myapp/views/assets/js/script.js'></script>\n";

    case 'ui'                 : return "<script src='$this->base_url/myapp/views/assets/js/jquery-ui-1.9.2.custom.min.js'></script>\n";
    case 'accordion'          : return "<script src='$this->base_url/myapp/views/assets/js/accordion.js'></script>\n";
    case 'multiselect'        : return "<script src='$this->base_url/myapp/views/assets/js/bootstrap-multiselect.js'></script>\n";
    case 'file-input'         : return "<script src='$this->base_url/myapp/views/assets/js/bootstrap-file-input.js'></script>\n";
    case 'file-style'         : return "<script src='$this->base_url/myapp/views/assets/js/bootstrap-file-style.js'></script>\n";
    case 'lightbox'           : return "<script src='$this->base_url/myapp/views/assets/js/ekko-lightbox.min.js'></script>\n";
    case 'datepicker'         : return "<script src='$this->base_url/myapp/views/assets/js/bootstrap-datepicker.js'></script>\n";
    case 'growl'              : return "<script src='$this->base_url/myapp/views/assets/js/bootstrap-growl.min.js'></script>\n";
    
    }
  }
  
  function load_css($case = 'web_default'){  
    switch($case){ 
    case 'web_default' : return "<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>\n
                                 <link rel='stylesheet' href='$this->base_url/myapp/views/assets/fonts/font-awesome/css/font-awesome.min.css'>\n
                                 <link rel='stylesheet' href='$this->base_url/myapp/views/assets/css/bootstrap.min.css'>\n
                                 <link rel='stylesheet' href='$this->base_url/myapp/views/assets/css/animate/animate.css' />\n
                                 <link rel='stylesheet' href='$this->base_url/myapp/views/assets/css/animate/set.css' />\n
                                 <link rel='stylesheet' href='$this->base_url/myapp/views/assets/css/style.css'>\n";

    case 'admin'       : return "<link rel='stylesheet' href='$this->base_url/myapp/views/assets/css/bootstrap.original.min.css'>\n
                                 <link rel='stylesheet' href='$this->base_url/myapp/views/assets/css/body-padding.css'>\n
                                 <link rel='stylesheet' href='$this->base_url/myapp/views/assets/css/admin_style.css'>\n";

    case 'login'       : return "<link rel='stylesheet' href='$this->base_url/myapp/views/assets/css/bootstrap.min.css'>\n
                                 <link rel='stylesheet' href='$this->base_url/myapp/views/assets/css/admin_style.css'>\n";
    case 'accordion'   : return "<link rel='stylesheet' href='$this->base_url/myapp/views/assets/css/accordion.css'>\n";
    case 'multiselect' : return "<link rel='stylesheet' href='$this->base_url/myapp/views/assets/css/bootstrap-multiselect.css'>\n";
    case 'lightbox'    : return "<link rel='stylesheet' href='$this->base_url/myapp/views/assets/css/ekko-lightbox.min.css'>\n";
    case 'datepicker'  : return "<link rel='stylesheet' href='$this->base_url/myapp/views/assets/css/datepicker.css'>\n";
   
    }
  
  }



//************************************************************   Session functions **********************************************************************



  function secure_session_start(){
    
    $session_name = 'secure_session';
    $secure = false;
    $httponly = true;
    ini_set("session.cookie_lifetime","7200");
    ini_set("session.gc_maxlifetime","7200");
    ini_set('session.use_only_cookies', 1);       //Forza a las sesiones a sólo utilizar cookies.
    $cookieParams = session_get_cookie_params();  //Obtén params de cookies actuales.
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
    session_name($session_name);                  //Configura el nombre de sesión a el configurado arriba.
    session_start();                              //Inicia la sesión php 
    session_regenerate_id(true);                  //Regenera la sesión, borra la previa.
    
    if(!$_SESSION['login_id']) return false;
    return true; 
  }

  
  
  
  //************************************************ e-mails functions **************************************************************************************


  function php_mailer(){
    require_once('PHPMailer/class.phpmailer.php');
  }

  private function mailer($info=array()){

    //Make object
    $this->php_mailer();
    $mail = new PHPMailer();
    
    $mail->isSMTP();
    $mail->Mailer = "smtp";
    //$mail->SMTPSecure = "tls";
    $mail->Host = "ssl://smtp.gmail.com";  // Specify main and backup server
    $mail->Port = 465;
    $mail->SMTPAuth = true;  // Enable SMTP authentication
    $mail->Username = 'smtptroc@gmail.com';
    $mail->Password = 'a1s2d3f4s';
    $mail->From = 'smtptroc@gmail.com';
    //$mail->Username = 'christopher.troc@gmail.com';
    //$mail->Password = 'a1s2d3f4h10';
    //$mail->From = 'christopher.troc@gmail.com';
    $mail->FromName = 'CCM Photo.';
    $mail->addAddress($info[email]);  // Add a recipient
    $mail->isHTML(true);                    // Set email format to HTML
    $mail->Subject = "$info[subject]";
    $mail->Body    =  $info[email_body];
    //condificacción utf-8
    $mail->CharSet = 'UTF-8';
         
    if(!$mail->send()) {
      //echo $mail->ErrorInfo;
      var_dump($info);
      exit;
     }
  
  }

  function send_notification_user($user){
    
    $email_body = '
      <html>
        <head>
          <meta charset="utf-8" />
        </head>
        <body style="font-family: Helvetica, Arial, Sans-Serif;">
          <div align="left" style="width:720px">
            <table align="left" width="720" border="0" style="margin-top:10px;">
              <tr>
                <td style="background-color:#D0D0DA; color:white; padding:5px;"><strong>Bienvenido a CCM Photo </strong></td>
              </tr>
            </table>
            <table align="left" width="400" border="0" cellspacing="3" cellpadding="3" style="margin-top:10px;">
              <tr>
                <td>Nombre de Usuario:</td>
                <td><span style="padding:5px; background:#ebe8e8;">'.$user[login].' </span></td> 
              </tr>
              <tr>
                <td>Contraseña:</td>
                <td><span style="padding:5px; background:#ebe8e8;">'.$user[pass].'</span></td>
              </tr>
            </table>
            <table align="left" width="720" border="0" style="margin-top:15px;">
              <tr>
                <td>Para poder hacer uso del sistema, debes activar tu Cuenta de usuario haciendo click en el siguiente link: </br>
                    <a href="'.$this->to('activate_user_account').'?id='.$user[id].'&key='.$user['key'].'"><strong>Activar Cuenta de Usuario</strong></a>. </td>
              </tr>
            </table>
          </div>
        </body>
      </html>';

    $info = array('email' => $user[login], 'subject' => 'Bienvenido a CCM photo', 'email_body' => $email_body);
    $this->mailer($info);
    return;
  }
  
  function send_recovery_password_email($user){

    $email_body = '
      <html>
        <head>
          <meta charset="utf-8" />
        </head>
        <body style="font-family: Helvetica, Arial, Sans-Serif;">
          <div align="left" style="width:720px">
            <table align="left" width="720" border="0" style="margin-top:10px;">
              <tr>
                <td style="background-color:#D0D0DA; color:white; padding:5px;"><strong>Recuperación de password, CCM Photo.</strong></td>
              </tr>
            </table>
            <table align="left" width="720" border="0" style="margin-top:15px;">
              <tr>
              <td>
                   Has solicitado recuperar tu password de usuario, has click en el siguiente enlace: </br>
                  <a href="'.$this->to('renew_password').'?id='.$user[id].'&key='.$user[activation_key].'"><strong>Recuperar Password</strong></a>
                </td>
              </tr>
              <tr>
                <td>En caso que no hallas solicitado la recuperación de password, omita este email. y notifique este situación a 
                    <a href="mailto:cristobalcornejomaturana@gmail.com" >cristobalcornejomaturana@gmail.com</a>
                </td>
              </tr>
            </table>
          </div>
        </body>
      </html>';

    $info = array('email' => $user[login], 'subject' => 'Recuperacion de password, CCM Photo', 'email_body' => $email_body);
    $this->mailer($info);
    return;

   }
  
  function send_new_password_email($user,$password){
     
    $email_body = '
      <html>
        <head>
          <meta charset="utf-8" />
        </head>
        <body style="font-family: Helvetica, Arial, Sans-Serif;">
          <div align="left" style="width:720px">
            <table align="left" width="720" border="0" style="margin-top:10px;">
              <tr>
                <td style="background-color:#D0D0DA; color:white; padding:5px;"><strong>Tu nuevo password, CCM Photo.</strong></td>
              </tr>
            </table>
            <table align="left" width="720" border="0" style="margin-top:15px;">
              <tr>
                <td>En hora buena, has recuperado tu password, tu nuevo password es: <span style="padding:5px; background:#ebe8e8;">'.$password.'</span></br>
                    <p><a href="'.$this->to('home').'"><strong>Iniciar Sesión</strong></a></p>
                </td> 
              </tr>
            </table>
          </div>
        </body>
      </html>';

    $info = array('email' => $user[login], 'subject' => 'Tu nuevo password, CCM Photo', 'email_body' => $email_body);
    $this->mailer($info);
    return;

  
  }


//****************************************************** images files functions **********************************************************************************



  function check_extension($name_file, $extensions = array('.jpg', '.pdf', '.doc', '.docx')){
    $ext = $this->get_extencion_file($name_file);
     if(!in_array($ext,$extensions)){
         return false;
      }
      
    return true;
  }

  function get_extencion_file($file_name){
    if(!$file_name) return false;
    $extencion = substr($file_name, strrpos($file_name,'.'));
    return $extencion;
  }

  function clean_spaces($string){
    $clean = preg_replace( "([ ]+)", "", $string );
    return $clean;
  }
    
  function upload_file($file_tmp,$file_name,$folder){
    $file_name = $this->clean_spaces($file_name);

    if(!$dir = opendir($folder)) mkdir($folder,0777);
    $route = $folder.$file_name;
    if(move_uploaded_file($file_tmp, $route)) return true;
    return false;
    
   
  
  }//End function

  function delete_image($file_name,$folder){
    $route_img  = $folder."/".$file_name;
    $route_thum = $folder."/thum_".$file_name;
    unlink($route_img);
    unlink($route_thum);      
  }//End function

  //Deslete directory complete (recursive funcntion)
  function deleteDirectory($dir) {
    if(!$dh = @opendir($dir)) return;
        while (false !== ($current = readdir($dh))) {
          if($current != '.' && $current != '..') {
            if (!@unlink($dir.'/'.$current)) $this->deleteDirectory($dir.'/'.$current);
          }       
        }
    closedir($dh);
    @rmdir($dir);
  }

  function view_images_box($folder){
    
    $dir = opendir($folder);
    
    while($file = readdir($dir)){
      if($file != '.' && $file != '..' && strpos($file,"thum_") === false ){
           $files[] = $file;
      }
    }
  
    return $files;
  
  }//End function 


function create_image($source,$route,$new_w){
  require_once('thumbnails.php');
  $image = new thumb();
  $image->loadImage($source);
  $image->resize($new_w, 'width');
  $image->save($route,100);

}


}//End Class

?>
