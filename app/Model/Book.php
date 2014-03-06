<?php
App::uses('Book', 'Model');

class Book extends AppModel {
  public $name = "Book";
  private $_viewFields = array('title', 'author', 'isbn', 'publisher');

  public function findBooks($title, $author){
    $conditions = array();
    if($title != null){
      array_push($conditions, array('title LIKE' => '%'.$title.'%'));
    }else if($author != null){
      array_push($conditions, array('author LIKE' => '%'.$author.'%'));
    }
    return $this->find('all', array('fields' => $this->_viewFields, 'conditions' => $conditions));
  }
}
?>
