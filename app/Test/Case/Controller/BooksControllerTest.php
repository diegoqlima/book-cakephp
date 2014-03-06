<?php
class BooksControllerTest extends ControllerTestCase {

  function test_index() {
    $response = $this->testAction('/books');
    $this->assertTrue(is_array($this->vars['books']), 'Books array is set');
  }

  function test_index_id_exists() {
    $response = $this->testAction('/books/1');
    $this->assertTrue(count($this->vars['books']) == 1, 'Book exists');
  }

  function test_index_id_no_exists() {
    $response = $this->testAction('/books/99');
    $this->assertTrue(count($this->vars['books']) == 0, 'Book no exists');
  }

  function test_view_author() {
    $response = $this->testAction('/books/author:G.');
    $this->assertTrue(count($this->vars['books']) == 1, 'Book exists');
  }

  function test_view_author_no_exists() {
    $response = $this->testAction('/books/author:Foo');
    $this->assertTrue(count($this->vars['books']) == 0, 'Book no exists');
  }

  function test_view_title() {
    $response = $this->testAction('/books/title:1');
    $this->assertTrue(count($this->vars['books']) == 2, 'Book exists');
  }

  function test_view_title_no_exists() {
    $response = $this->testAction('/books/title:Bar');
    $this->assertTrue(count($this->vars['books']) == 0, 'Book no exists');
  }

  function test_view_author_title() {
    $response = $this->testAction('/books/author:G./title:1');
    $this->assertTrue(count($this->vars['books']) == 2, 'Book exists');
  }

  function test_view_author_title_no_exists() {
    $response = $this->testAction('/books/author:Foo/title:Bar');
    $this->assertTrue(count($this->vars['books']) == 0, 'Book no exists');
  }

  function test_view_title_author() {
    $response = $this->testAction('/books/title:1/author:G.');
    $this->assertTrue(count($this->vars['books']) == 2, 'Book exists');
  }

  function test_view_title_author_no_exists() {
    $response = $this->testAction('/books/title:Bar/author:Foo');
    $this->assertTrue(count($this->vars['books']) == 0, 'Book no exists');
  }

}
?>
