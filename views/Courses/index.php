<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Courses List</h1>
        <a class="btn btn-primary mb-3" href="index.php?controller=course&action=create">Create Course</a>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Title</th>
					<th>Description</th>
                    <th>Create At</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $indexCourse = 1;
                foreach ($courses as $course) : ?>
                    <tr>
                        <td><?php echo $indexCourse ?></td>
                        <td><?php echo $course['title']; ?></td>
						<td><?php echo $course['description']; ?></td>
                        <td><?php echo $course['created_at']; ?></td>
                        <td><?php echo $course['updated_at']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="index.php?controller=course&action=edit&id=<?php echo $course['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="index.php?controller=course&action=delete&id=<?php echo $course['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php $indexCourse++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>