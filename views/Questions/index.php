<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Question List</h1>
        <a class="btn btn-primary mb-3" href="index.php?controller=question&action=create">Create Question</a>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Quizze</th>
                    <th>Question</th>
                    <th>Create At</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $indexQuestion = 1;
                foreach ($questions as $question) : ?>
                    <tr>
                        <td><?php echo $indexQuestion ?></td>
                        <td><?php echo $question['quizzes_title']; ?></td>
                        <td><?php echo $question['question']; ?></td>
                        <td><?php echo $question['created_at']; ?></td>
                        <td><?php echo $question['updated_at']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="index.php?controller=question&action=edit&id=<?php echo $question['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="index.php?controller=question&action=delete&id=<?php echo $question['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php $indexQuestion ++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>