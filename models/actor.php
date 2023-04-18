<?php
  class ActorModel
  {
      private $db;
  
      public function __construct(PDO $db)
      {
          $this->db = $db;
      }
  
      public function getAllActors()
      {
          $stmt = $this->db->query("SELECT * FROM actor");
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
  
      public function getActorById($id)
      {
          $stmt = $this->db->prepare("SELECT * FROM actor WHERE actor_id = :id");
          $stmt->bindParam(':id', $id);
          $stmt->execute();
          return $stmt->fetch(PDO::FETCH_ASSOC);
      }
  
      public function createActor($firstName, $lastName)
      {
          $stmt = $this->db->prepare("INSERT INTO actor (first_name, last_name) VALUES (:firstName, :lastName)");
          $stmt->bindParam(':firstName', $firstName);
          $stmt->bindParam(':lastName', $lastName);
          $stmt->execute();
      }
  
      public function updateActor($id, $firstName, $lastName)
      {
          $stmt = $this->db->prepare("UPDATE actor SET first_name = :firstName, last_name = :lastName WHERE actor_id = :id");
          $stmt->bindParam(':id', $id);
          $stmt->bindParam(':firstName', $firstName);
          $stmt->bindParam(':lastName', $lastName);
          $stmt->execute();
      }
  
      public function deleteActor($id)
      {
          $stmt = $this->db->prepare("DELETE FROM actor WHERE actor_id = :id");
          $stmt->bindParam(':id', $id);
          $stmt->execute();
      }
  }
?>