<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Course</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container mt-5">
		<h1>Edit Course</h1>

		<form method="post" action="index.php?controller=course&action=update">
			<input type="hidden" name="id" value="<?php echo $course['id']; ?>">
			<div class="form-group">
				<label for="title" class="text-right">Title </label>
				<input type="text" class="form-control custom" name="title" id="title" value="<?php echo $course['title']; ?>"/>
			</div>
			<div class="form-group">
				<label for="description">Description </label>
				<input type="text" class="form-control custom" name="description" id="description" value="<?php echo $course['description']; ?>"/>
			</div>
			<input type="hidden" name="update_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
			<button type="submit" class="btn btn-primary">Update</button>
			<a class="btn btn-warning" href="index.php?controller=course&action=index">Back</a>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>