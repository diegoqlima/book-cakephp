<?php
App::uses('AppController', 'Controller');

class BooksController extends AppController {
  public $name = "Books";
  public $layout = 'ajax';
  public $_fields = array('title', 'author');

  public function index($id = null){
    if($id != null){
      $books = $this->Book->findById($id, $this->_fields);
    }else{
      $books = $this->Book->find('all', array('fields' => $this->_fields));
    }
    $this->set('books', $books);
  }

  public function viewAuthor($author = null, $title = null){
    $author = preg_replace(array("/author:/"), array(""), $author);
    $title = preg_replace(array("/title:/"), array(""), $title);
    $books = $this->Book->findBooks($title, $author);
    $this->set('books', $books);
    $this->render('view');
  }

  public function viewTitle($title = null, $author = null){
    $title = preg_replace(array("/title:/"), array(""), $title);
    $author = preg_replace(array("/author:/"), array(""), $author);
    $books = $this->Book->findBooks($title, $author);
    $this->set('books', $books);
    $this->render('view');
  }

}
?>
