<?
class Users_Model extends TinyMVC_Model {


  /*///////////////////////////////////////////// Account Functions //////////////////////////////////*/


  function verify_login($login,$pass){
    
    $pass = md5($pass);
    $user_db = $this->db->query_one('SELECT * FROM users_login WHERE login=? ',array($login));
    
    if($user_db['password'] == $pass) return $user_db;

    return false;
    
   }
  //Create super user
  function new_sudo($key,$login,$pass,$user_level=5){
    
    if($key == 15550754) {
      
      $pass=md5($pass);
      $query =  $this->db->insert('users_login', array('login'=>$login,'password'=>$pass, 'user_level' => $user_level, 'active' => 1) );
      return $query;
    
    } else {

      return false;
    
    }
  }
  
  //Make a User
  function new_user( $user_email, $user_level=1){
    //First we verify if user email is on data base
    if($this->verify_email($user_email)) return  $error = 'already_exists';
  
    //Generate string 6 characters
    $pass = substr( md5(microtime()), 1, 6);
    $pass_db = md5($pass);
    $activation_key = substr( md5(microtime()), 1, 10);
    
    $query =  $this->db->insert('users_login', array('login'=>$user_email,'password'=>$pass_db, 'user_level' => $user_level, 'activation_key' => $activation_key) );
    
    if($query) return array("id"         => $this->db->last_insert_id(),
                            "user_login" => $user_email,
                            "pass"       => $pass,
                            "key"        => $activation_key
                           );

    return false;
  }


  
  function update_password($new_password, $login_id){
    $md5_pass = md5($new_password);
    $this->db->where('id', $login_id);
    return $this->db->update('users_login', array('password' => $md5_pass));
  }

  function update_email_account($account = array()){
    if(!$account) return false;
    $update_password = $this->update_password($account[new_password],$account[id_login]);
    
    $this->db->where('id', $account[id_login]);
    $update_email = $this->db->update('users_login', array('login' => $account[email]));

    if($update_password AND $update_email) return true;
    return false;
    
  }

  function get_user($login_id){
    $user = $this->db->query_one('SELECT * FROM users_login WHERE id=? ',array($login_id));
    return $user;
  }

  function delete_user($login_id){
    $this->db->where("id",$login_id); //id = $login_id
    $delete = $this->db->delete("users_login");

    return $delete;
  }
  
  function verify_email($email_new_user){
    return $this->db->query_one('SELECT * FROM users_login WHERE login=? ',array($email_new_user));
  }

  //Active Account function
  function get_activation_key($id_user){
    return $this->db->query_one('SELECT activation_key FROM users_login WHERE id=? ',array($id_user));
  }
  
  function active_account($id_user){
    $this->renew_activation_key($id_user);
    $this->db->where('id', $id_user);
    return $this->db->update('users_login', array('active'=> 1) );
  }
  
  function renew_activation_key($id_user){
    $new_key = substr( md5(microtime()), 1, 10);
    $this->db->where('id', $id_user);
    return $this->db->update('users_login', array('activation_key' => $new_key ) );
  }


  
  
  /*////////////////////////////////////////////////////    Users Info Functions   /////////////////////////////////////////////////*/


  
  function insert_user_info($user_info = array()){

    return $this->db->insert('users', array('id_login'  => $user_info[id_login],
                                            'name'      => $user_info[name],
                                            'last_name' => $user_info[last_name],
                                            'email'     => $user_info[email]
                                           ));
  }
  
  function update_user_info($user_info = array()){
      $this->db->where('id' , $user_info[id]);
      return $this->db->update('users', array('id'        => $user_info[id],
                                              'name'      => $user_info[name],
                                              'last_name' => $user_info[last_name],
                                              'email'     => $user_info[email]
                                           ));
  }

  function get_users_list(){
    return $this->db->query_all("SELECT * FROM users");
  }

  function get_user_info($id_user){
    if(!$id_user) return false;
    return $this->db->query_one("SELECT * FROM users WHERE id=?", array($id_user));
  }   



} // End class

?>
