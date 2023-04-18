<?php
  require_once 'model/ActorModel.php';

  class ActorController
  {
      private $model;
  
      public function __construct()
      {
          $this->model = new ActorModel();
      }
  
      public function index()
      {
          $actors = $this->model->getAllActors();
          include 'view/actor/index.php';
      }
  
      public function show($id)
      {
          $actor = $this->model->getActorById($id);
          include 'view/actor/show.php';
      }
  
      public function create()
      {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $firstName = $_POST['first_name'];
              $lastName = $_POST['last_name'];
              $this->model->createActor($firstName, $lastName);
              header('Location: index.php');
          } else {
              include 'view/actor/create.php';
          }
      }
  
      public function update($id)
      {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $firstName = $_POST['first_name'];
              $lastName = $_POST['last_name'];
              $this->model->updateActor($id, $firstName, $lastName);
              header('Location: index.php');
          } else {
              $actor = $this->model->getActorById($id);
              include 'view/actor/update.php';
          }
      }
  
      public function delete($id)
      {
          $this->model->deleteActor($id);
          header('Location: index.php');
      }
  }
?>