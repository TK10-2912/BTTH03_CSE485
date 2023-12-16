<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quizze</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Quizze</h1>

        <form method="post" action="index.php?controller=quizze&action=update">
            <input type="hidden" name="id" value="<?php echo $quizze['id']; ?>">

            <div class="form-group">
                <label for="lesson_id">Lesson</label>
                <select class="form-control" name="lesson_id" id="lesson_id" required>
                    <?php
                    $conn = new mysqli("localhost", "root", "", "btth03_cse485");

                    if ($conn->connect_error) {
                        die("Kết nối thất bại: " . $conn->connect_error);
                    }
                    $result = $conn->query("SELECT id, title FROM lessons");
                    while ($row = $result->fetch_assoc()) {
                        $selected = ($row['id'] == $quizze['lesson_id']) ? "selected" : "";
                        echo "<option value='" . $row['id'] . "' $selected>" . $row['title'] . "</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo $quizze['title']; ?>" required>
            </div>
            <input type="hidden" name="update_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-warning" href="index.php?controller=quizze&action=index">Back</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>