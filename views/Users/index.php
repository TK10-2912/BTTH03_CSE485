<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Users List</h1>
        <a class="btn btn-primary mb-3" href="index.php?controller=user&action=create">Create User</a>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Email</th>
					<th>Password</th>
                    <th>Create At</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $indexUser = 1;
                foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $indexUser ?></td>
                        <td><?php echo $user['name']; ?></td>
						<td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['password']; ?></td>
						<td><?php echo $user['created_at']; ?></td>
                        <td><?php echo $user['updated_at']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="index.php?controller=user&action=edit&id=<?php echo $user['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="index.php?controller=user&action=delete&id=<?php echo $user['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php $indexUser++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>