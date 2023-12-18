<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create User</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container mt-5">
		<h1>Create User</h1>

		<form method="post" action="index.php?controller=user&action=store">
			<div class="form-group">
				<label for="name" class="text-right">Name </label>
				<input type="text" class="form-control custom" placeholder="Your Name" name="name" />
			</div>
			<div class="form-group">
				<label for="email">Email </label>
				<input type="text" class="form-control custom" placeholder="Email" name="email" />
			</div>
			<div class="form-group">
				<label for="password">Password </label>
				<input type="password" class="form-control custom" placeholder="Password" name="password" />
			</div>
			<button type="submit" class="btn btn-primary">Create</button>
			<a class="btn btn-warning" href="index.php?controller=user&action=index">Back</a>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>