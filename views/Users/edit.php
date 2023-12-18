<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit User</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container mt-5">
		<h1>Edit User</h1>

		<form method="post" action="index.php?controller=user&action=update">
		<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
			<div class="form-group">
				<label for="name" class="text-right">Name </label>
				<input type="text" class="form-control custom" placeholder="Your Name" name="name" id="name" value="<?php echo $user['name']; ?>"/>
			</div>
			<div class="form-group">
				<label for="email">Email </label>
				<input type="text" class="form-control custom" placeholder="Email" name="email" id="email" value="<?php echo $user['email']; ?>"/>
			</div>
			<div class="form-group">
				<label for="password">Password </label>
				<input type="password" class="form-control custom" placeholder="Password" name="password" id="password" value="<?php echo $user['password']; ?>"/>
			</div>
			<input type="hidden" name="update_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
			<button type="submit" class="btn btn-primary">Update</button>
			<a class="btn btn-warning" href="index.php?controller=user&action=index">Back</a>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>