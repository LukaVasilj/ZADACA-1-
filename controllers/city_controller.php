<?php
require_once('models/CityModel.php');

class CityController {
	private $model;

	public function __construct($db) {
		$this->model = new CityModel($db);
	}

	public function index() {
		$cities = $this->model->getAllCities();
		require('views/city/index.php');
	}

	public function show($id) {
		$city = $this->model->getCityById($id);
		require('views/city/show.php');
	}

	public function create() {
		require('views/city/create.php');
	}

	public function store($name, $country_id) {
		$id = $this->model->createCity($name, $country_id);
		header("Location: index.php?controller=city&action=show&id=$id");
	}

	public function edit($id) {
		$city = $this->model->getCityById($id);
		require('views/city/edit.php');
	}

	public function update($id, $name, $country_id) {
		$this->model->updateCity($id, $name, $country_id);
		header("Location: index.php?controller=city&action=show&id=$id");
	}

	public function delete($id) {
		$this->model->deleteCity($id);
		header("Location: index.php?controller=city&action=index");
	}
}