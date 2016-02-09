<?
class Web_Controller extends TinyMVC_Controller{
  
  function Index(){

    $this->load->model('Articles_Model','model_articles');
    $categorys = $this->model_articles->getCategoriesFront();
    $web          = $this->model_articles->getWeb();

    //$about = $this->order_about($web[aboutme]);

    

    $this->view->assign('stylesheets',array($this->helpers->load_css('web_default'), ));
    $this->view->assign('footer_js',  array($this->helpers->load_javascript('web_default')));

    $this->view->assign('title','CCM fotografia');
    $this->view->assign('keywords', $web[key_words]);
    $this->view->assign('categorys', $categorys);
    $this->view->assign('about', $about);
    $this->view->assign('web', $web);
    $this->view->assign('helper',$this->helpers);
    $this->view->display('header');
    $this->view->display('web_view');
    $this->view->display('footer');

    return;
  }



  private function order_about($about){
    $long   = strlen($about);
    $end    = strpos($about," ",($long/2));
    $start  = $end;
    $result = array('col_1' => substr($about,0,$end),
                    'col_2' => substr($about,$start)
                  );

    return $result;
  }


  function contact(){

    // Check for empty fields
    if(empty($_POST['name'])    ||
       empty($_POST['email'])   ||
       empty($_POST['message'])) 
    {
      echo "Campos incorrectos !!!";
      return false;
    }

    $this->helpers->php_mailer();
    
    $name = $_POST['name'];
    $email_address = $_POST['email'];
    $message = $_POST['message'];
    
    // Create the email
    $to = 'cristobalcornejomaturana@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    $email_subject = "Mensaje desde CCM fotografia Web";
    $email_body = "Has recibido un nuevo menssaje desde tu sitio web.\n\nNombre: $name\n\nEmail: $email_address\n\nMensage:\n$message";
    
    //Make object and send e-mail
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
    $mail->FromName = 'CCM fotografia WEB.';
    $mail->addAddress($to);  // Add a recipient
    $mail->isHTML(true);                    // Set email format to HTML
    $mail->Subject = "CCM fotografia.";
    $mail->Body    =  $email_body;
    
    if(!$mail->send()) {
      echo $mail->ErrorInfo;
    exit;
    }
    
    echo "1"; 
    return true;			
    
  }

  function viewAlbum(){
    if(!$_GET[id]){ $this->Index(); return; }

    $this->load->model('Articles_Model','model_articles');

    $category = $this->model_articles->getSingleCategory($_GET[id]);
    $articles = $this->model_articles->getArticles($_GET[id]);

    $this->view->assign('stylesheets',array($this->helpers->load_css('web_default')));
    $this->view->assign('footer_js',  array($this->helpers->load_javascript('web_default')));
    

    $this->view->assign('title','CCM fotografia');
    //$this->view->assign('keywords', "");
    $this->view->assign('category', $category);
    $this->view->assign('articles',  $articles);
    $this->view->assign('helper',$this->helpers);
    $this->view->display('header');
    $this->view->display('album_view');
    $this->view->display('footer');

    return;
    
  }

}
