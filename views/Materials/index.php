<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Material List</h1>
        <a class="btn btn-primary mb-3" href="index.php?controller=material&action=create">Create Material</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lesson_ID</th>
                    <th>Title</th>
                    <th>File_Path</th>
                    <th>Create At</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $indexMaterial = 1;
                foreach ($materials as $material) : ?>
                    <tr>
                        <td><?php echo $indexMaterial ?></td>
                        <td><?php echo $material['lesson_id']; ?></td>
                        <td><?php echo $material['title']; ?></td>
                        <td><?php echo $material['file_path']; ?></td>
                        <td><?php echo $material['created_at']; ?></td>
                        <td><?php echo $material['updated_at']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="index.php?controller=material&action=edit&id=<?php echo $material['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="index.php?controller=material&action=delete&id=<?php echo $material['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php $indexMaterial++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>