<?php
require_once('models/Country.php');

class CountryController
{
	private $countryModel;

	public function __construct($db)
	{
		$this->countryModel = new Country($db);
	}

	public function index()
	{
		$countries = $this->countryModel->getAll();
		include('views/country/index.php');
	}

	public function create()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = [
				'country' => $_POST['country']
			];
			$this->countryModel->create($data);
			header('Location: index.php?controller=country&action=index');
		} else {
			include('views/country/create.php');
		}
	}

	public function edit($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = [
				'country' => $_POST['country']
			];
			$this->countryModel->update($id, $data);
			header('Location: index.php?controller=country&action=index');
		} else {
			$country = $this->countryModel->getById($id);
			include('views/country/edit.php');
		}
	}

	public function delete($id)
	{
		$this->countryModel->delete($id);
		header('Location: index.php?controller=country&action=index');
	}
}