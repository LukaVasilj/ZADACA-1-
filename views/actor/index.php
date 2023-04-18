<!DOCTYPE html>
<html>
<head>
	<title>Actors</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Actors</h1>
		<a href="index.php?controller=actor&action=create" class="btn btn-primary mb-3">Create New Actor</a>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($actors as $actor): ?>
					<tr>
						<td><?= $actor['actor_id'] ?></td>
						<td><?= $actor['first_name'] ?></td>
						<td><?= $actor['last_name'] ?></td>
						<td>
							<a href="index.php?controller=actor&action=show&id=<?= $actor['actor_id'] ?>" class="btn btn-secondary btn-sm mr-2">View</a>
							<a href="index.php?controller=actor&action=update&id=<?= $actor['actor_id'] ?>" class="btn btn-primary btn-sm mr-2">Edit</a>
							<a href="index.php?controller=actor&action=delete&id=<?= $actor['actor_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this actor?')">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>
</html>