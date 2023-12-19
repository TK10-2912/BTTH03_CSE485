<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Options List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Options List</h1>
        <a class="btn btn-primary mb-3" href="index.php?controller=question&action=create">Create Question</a>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Question</th>
                    <th>Option</th>
                    <th>Correct</th>
                    <th>Create At</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $indexOptions = 1;
                foreach ($options as $option) : ?>
                    <tr>
                        <td><?php echo $indexOptions ?></td>
                        <td><?php echo $option['question_title']; ?></td>
                        <td><?php echo $option['option']; ?></td>
                        <td><?php echo $option['is_correct']; ?></td>
                        <td><?php echo $option['created_at']; ?></td>
                        <td><?php echo $option['updated_at']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="index.php?controller=question&action=edit&id=<?php echo $option['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="index.php?controller=question&action=delete&id=<?php echo $option['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php $indexOptions ++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>