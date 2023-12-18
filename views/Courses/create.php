<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Course</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container mt-5">
		<h1>Create Course</h1>

		<form method="post" action="index.php?controller=course&action=store">
			<div class="form-group">
				<label for="title" class="text-right">Title </label>
				<input type="text" class="form-control custom" name="title" id="title" />
			</div>
			<div class="form-group">
				<label for="description">Description </label>
				<input type="text" class="form-control custom" name="description" id="description"/>
			</div>
			<button type="submit" class="btn btn-primary">Create</button>
			<a class="btn btn-warning" href="index.php?controller=course&action=index">Back</a>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>