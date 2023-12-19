<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Question</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Create Question</h1>

        <form method="post" action="index.php?controller=question&action=store">
            <div class="form-group">
                <label for="quiz_id">Quizze</label>
                <select class="form-control" name="quiz_id" id="quiz_id" required>
                <?php
                    $conn = new mysqli("localhost", "root", "", "btth03_cse485");
                    if ($conn->connect_error) {
                        die("Kết nối thất bại: " . $conn->connect_error);
                    }
                    $result = $conn->query("SELECT id, title FROM quizzes");

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $selected = ($row['id'] == $quizze['quiz_id']) ? 'selected' : '';
                            echo "<option value=\"{$row['id']}\" {$selected}>{$row['title']}</option>";
                        }
                    }

                    $conn->close();
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="question">Question:</label>
                <input type="text" class="form-control" name="question" id="question" required>
            </div>
            <input type="hidden" name="create_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <button type="submit" class="btn btn-primary">Create</button>
            <a class="btn btn-warning" href="index.php?controller=question&action=index">Back</a>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>