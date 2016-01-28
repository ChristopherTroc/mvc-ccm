<?
class Articles_Model extends TinyMVC_Model { 
  
  /*************************************+    Get Functions  ******************************************/

  function getArticles($id_category){
    return $this->db->query_all("SELECT * FROM articles  WHERE id_category = $id_category ORDER BY position");
  }
  

  function getSingleArticle($id_article){
    return $this->db->query_one("SELECT * FROM articles WHERE id=?", array($id_article));
  }

  function getCategories(){
    return $this->db->query_all("SELECT * FROM categories");
  }

  function getCategoriesFront(){
    $query = "SELECT a.*, b.img, b.url 
              FROM categories as a 
              JOIN articles as b ON (a.idFront = b.id)";

    return $this->db->query_all($query);
  }

  function getSingleCategory($id_category){
    return $this->db->query_one("SELECT * FROM categories WHERE id=?", array($id_category));
  }

  function getWeb(){
    return $this->db->query_one("SELECT * FROM web");
  }

  /*************************************+    Insert Functions  ******************************************/

  function insertCategory($category){
    $categories = $this->getCategories();
    
    foreach($categories AS $single_category){
      if($single_category[category] == $category){
         return "on_database";
      }
    }
    return $this->db->insert('categories', array('category' => $category) );
  }

  function insertArticle($article=array()){ 

    $articles = $this->getArticles($article[category_id]);
    
    foreach($articles AS $single_article){
      if($single_article[title] == $article[title]){
         return "on_database"; 
      }
    }

    if($article[url]) { 
       $execute = $this->db->insert('articles', array('id_category' => $article[category_id],
                                                      'title'       => $article[title],
                                                      'description' => $article[description],
                                                      'date'        => $article['date'],
                                                      'url'         => $article[url]
                                                    ));
    } else {
       $execute = $this->db->insert('articles', array('id_category' => $article[category_id],
                                                      'title'       => $article[title],
                                                      'description' => $article[description],
                                                      'date'        => $article['date'],
                                                      'img'         => $article[img]
                                                    ));
    
    }
    
    $category = $this->getSingleCategory($article[category_id]);
    if(!$category[idFront]){
      $front = array('idCategory' => $category[id], 'idArticle' => $this->db->last_insert_id() );
      $this->updateFrontCategory($front);
    }

    return $execute;

  }
  
  /*************************************+    Update Functions  ******************************************/

  
  
  function updateCategory($category=array()){
    $this->db->where('id', $category[id]);
    return $this->db->update('categories', array('category' => $category[category]) );
  }

  function updateFrontCategory($front = array()){
    if(!$front) return false;
    $this->db->where('id',$front[idCategory]);
    return $this->db->update('categories', array('idFront' => $front['idArticle']));
  }
  

  function updateArticle($article=array()){
    $articles = $this->getArticles($article[category_id]);
    
    foreach($articles AS $single_article){
      if($single_article[title] == $article[title] AND $single_article[id] != $article[id]){
         return "on_database";
      }
    }


    
    $this->db->where('id', $article[id]);

    if($article[img] AND $article[img] != ""){
      return $this->db->update('articles', array('id_category' => $article[category_id],
                                                 'title'       => $article[title],
                                                 'description' => $article[description],
                                                 'date'        => $article['date'],
                                                 'img'         => $article[img]
                                              ));
    } else 
    if($article[url]){
      return $this->db->update('articles', array('id_category' => $article[category_id],
                                                 'title'       => $article[title],
                                                 'description' => $article[description],
                                                 'date'        => $article['date'],
                                                 'url'         => $article[url]
                                              ));
    } else {
      return $this->db->update('articles', array('id_category' => $article[category_id],
                                                 'title'       => $article[title],
                                                 'description' => $article[description],
                                                 'date'        => $article['date'],
                                              ));
    }
  
  
  }//End function updateArticle
  
  function orderArticles($order=array()){
    $pos = 1;
    foreach($order AS $key):
      $this->db->where('id', $key);
      $this->db->update('articles',array('position' => $pos));
      $pos ++;
    endforeach;
  }

  //WEB Update

  function updateWeb($webFields = array()){
    return $this->db->update('web', array('title'   => $webFields[title],
                                          'footer'  => $webFields[footer],
                                          'aboutme' => $webFields[aboutme],
                                          'link_facebook'  => $webFields[link_facebook],
                                          'link_instagram' => $webFields[link_instagram],
                                          'key_words'       => $webFields[key_words]
                                        ));
  }
  
  
  
  /*************************************+    Delete Functions  ******************************************/
  function deleteCategory($id_category){
    //Delete Category
    $this->db->where('id',$id_category);
    $deleteCategory = $this->db->delete('categories');
    //Delete own Articles
    $this->db->where('id_category',$id_category);
    $deleteArticles =$this->db->delete('articles');

    if($deleteCategory AND $deleteArticles) return true;

    return false;
  }

  function deleteArticle($id_article){
    $this->db->where('id', $id_article);
    return $this->db->delete('articles');
  }

}

?>
