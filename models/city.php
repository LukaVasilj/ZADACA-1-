<?php
class CityModel {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function getAllCities() {
		$query = "SELECT * FROM city";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getCityById($id) {
		$query = "SELECT * FROM city WHERE city_id = :id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function createCity($name, $country_id) {
		$query = "INSERT INTO city (city, country_id) VALUES (:name, :country_id)";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':country_id', $country_id);
		$stmt->execute();
		return $this->db->lastInsertId();
	}

	public function updateCity($id, $name, $country_id) {
		$query = "UPDATE city SET city = :name, country_id = :country_id WHERE city_id = :id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':country_id', $country_id);
		return $stmt->execute();
	}

	public function deleteCity($id) {
		$query = "DELETE FROM city WHERE city_id = :id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}
}