<?php
  class Film_actor {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $actor_id;
    public $film_id;
    

    public function __construct($actor_id, $film_id) {
      $this->id      = $id;
      $this->film_id = $film_id;
      
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM film_actors');

      // we create a list of Actors objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Actor($post['actor_id'], $post['film_id']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM actors WHERE actors_id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('actor_id' => $id));
      $post = $req->fetch();

      return new Post($post['actor_id'], $post['film_id']);
    }
  }
?>