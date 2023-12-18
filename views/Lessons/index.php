<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lessons List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Lessons List</h1>
        <a class="btn btn-primary mb-3" href="index.php?controller=quizze&action=create">Create Lessons</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Create at</th>
                    <th>Update at</th>
                </tr>
            </thead>
            <tbody>
                <?php $indexLesson = 1;
                foreach ($lessons as $lesson) : ?>
                    <tr>
                        <td><?php echo $indexLesson ?></td>
                        <td><?php echo $lesson['course_id']; ?></td>
                        <td><?php echo $lesson['title']; ?></td>
                        <td><?php echo $lesson['description']; ?></td>
                        <td><?php echo $lesson['created_at']; ?></td>
                        <td><?php echo $lesson['updated_at']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="index.php?controller=lesson&action=edit&id=<?php echo $lesson['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="index.php?controller=lesson&action=delete&id=<?php echo $lesson['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php $indexLesson++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>