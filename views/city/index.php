<!DOCTYPE html>
<html>
<head>
	<title>City List</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-4">
		<h1>City List</h1>
		<a href="index.php?controller=city&action=create" class="btn btn-primary mb-3">Create New City</a>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Country</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($cities as $city) { ?>
				<tr>
					<td><?php echo $city['city_id']; ?></td>
					<td><?php echo $city['city']; ?></td>
					<td><?php echo $city['country']; ?></td>
					<td>
						<a href="index.php?controller=city&action=show&id=<?php echo $city['city_id']; ?>" class="btn btn-sm btn-info">View</a>
						<a href="index.php?controller=city&action=edit&id=<?php echo $city['city_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
						<form method="post" action="index.php?controller=city&action=delete&id=<?php echo $city['city_id']; ?>" style="display: inline-block;">
							<input type="hidden" name="_method" value="DELETE">
							<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this city?')">Delete</button>
						</form>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>