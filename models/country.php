<?php
class Country
{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	// Get all countries
	public function getAll()
	{
		$stmt = $this->db->prepare("SELECT * FROM country");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Get a single country by ID
	public function getById($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM country WHERE country_id = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	// Create a new country
	public function create($data)
	{
		$stmt = $this->db->prepare("INSERT INTO country (country, last_update) VALUES (:country, NOW())");
		$stmt->bindParam(':country', $data['country']);
		return $stmt->execute();
	}

	// Update an existing country
	public function update($id, $data)
	{
		$stmt = $this->db->prepare("UPDATE country SET country = :country, last_update = NOW() WHERE country_id = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':country', $data['country']);
		return $stmt->execute();
	}

	// Delete a country by ID
	public function delete($id)
	{
		$stmt = $this->db->prepare("DELETE FROM country WHERE country_id = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}