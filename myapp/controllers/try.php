<?
class Try_Controller extends TinyMVC_Controller {


  
  function index(){

  if($_POST[enviar]){
    $file_name = $this->helpers->clean_space($_FILES['img']['name']);
    $file_tmp  = $_FILES['img']['tmp_name'];
 
   $this->helpers->create_image($file_tmp,"./myapp/files/thumb_$file_name", 720); 
  }

?><!-- Form -->
    <form action="" method="POST" enctype="multipart/form-data">
     <input type="file" name="img">
     <input name="enviar" type="submit" value="enviar" >
    </form>
  <?

 } 

 /*
  $new_array = array("n1" => 1, "n2" => 2);
  $new_array_two = array("n1" => $new_array, "n2" => 3);

  var_dump($new_array_two);
   $string = "Hola mundo";
  $search = "mundo";

  if(strpos($string, $search) !== false) echo "encontrada"; 
   
  var_dump(strpos($string, "mundo")); 
}
  */
} 
?>
