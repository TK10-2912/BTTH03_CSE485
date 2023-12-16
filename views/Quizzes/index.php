<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzes List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Quizzes List</h1>
        <a class="btn btn-primary mb-3" href="index.php?controller=quizze&action=create">Create Quizze</a>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Lesson</th>
                    <th>Title</th>
                    <th>Create At</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $indexQuizze = 1;
                foreach ($quizzes as $quizze) : ?>
                    <tr>
                        <td><?php echo $indexQuizze ?></td>
                        <td><?php echo $quizze['lesson_title']; ?></td>
                        <td><?php echo $quizze['title']; ?></td>
                        <td><?php echo $quizze['created_at']; ?></td>
                        <td><?php echo $quizze['updated_at']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="index.php?controller=quizze&action=edit&id=<?php echo $quizze['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="index.php?controller=quizze&action=delete&id=<?php echo $quizze['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php $indexQuizze++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>