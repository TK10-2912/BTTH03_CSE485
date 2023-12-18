<?php
require_once(__DIR__ . '/../models/Lesson.php');


class LessonController
{
    // Display a list of articles
    public function index()
    {
        $lessons = Lesson::getAll();
        require 'views/lessons/index.php';
    }

    // Display the article creation form
    public function create()
    {
        require 'views/lessons/create.php';
    }

    // Store a newly created article in the database
    public function store()
    {
        $title = $_POST['title'];
		$description = $_POST['description'];
		$created_at = $_POST['created_at'];
		$updated_at = $_POST['updated_at'];

        $lesson = new Lesson();
        $lesson->setTitle($title);
		$lesson->setDescription($description);
		$lesson->setCreate_at($created_at);
		$lesson->setUpdate_at($updated_at);
        $lesson->save();

        header('Location: index.php?controller=lesson&action=index');
    }

    // Display the article editing form
    public function edit()
    {
        $id = $_GET['id'];
        $lesson = Lesson::getById($id);
        require 'views/lessons/edit.php';
    }

    // Update the specified article in the database
    public function update()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
		$created_at = $_POST['created_at'];
		$updated_at = $_POST['updated_at'];

        $lesson = new Lesson();
        $lesson->setId($id);
        $lesson->setTitle($title);
        $lesson->setDescription($description);
		$lesson->setCreate_at($created_at);
		$lesson->setUpdate_at($updated_at);
        $lesson->update();

        header('Location: index.php?controller=lesson&action=index');
    }

    // Delete the specified article from the database
    public function delete()
    {
        $id = $_GET['id'];
        $lesson = new Lesson();
        $lesson->setId($id);
        $lesson->delete();

        header('Location: index.php?controller=lesson&action=index');
    }
}
?>
