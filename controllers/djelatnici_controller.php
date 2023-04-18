<?php
  class DjelatniciController {
    public function index() {
      // we store all the posts in a variable
      $djelatnici = Djelatnik::all();
      require_once('views/djelatnici/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $djelatnik = Djelatnik::find($_GET['id']);
      require_once('views/djelatnici/show.php');
    }
  }
?>