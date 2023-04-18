<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Country List</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style>
		body {
			padding-top: 50px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Country List</h1>
		<a href="index.php?controller=country&action=create" class="btn btn-primary">Add Country</a>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Country</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($countries as $country): ?>
					<tr>
						<td><?= $country['country_id'] ?></td>
						<td><?= $country['country'] ?></td>
						<td>
							<a href="index.php?controller=country&action=edit&id=<?= $country['country_id'] ?>" class="btn btn-secondary">Edit</a>
							<a href="index.php?controller=country&action=delete&id=<?= $country['country_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this country?')">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>
</html>