<?php
require_once(__DIR__ . '/../models/Course.php');


class CourseController
{
    // Display a list of articles
    public function index()
    {
        $courses = Course::getAll();
        require 'views/courses/index.php';
    }

    // Display the article creation form
    public function create()
    {
        require 'views/courses/create.php';
    }

    // Store a newly created article in the database
    public function store()
    {
        $title = $_POST['title'];
		$description = $_POST['description'];
		$created_at = $_POST['created_at'];
		$updated_at = $_POST['updated_at'];

        $course = new Course();
        $course->setTitle($title);
		$course->setDescription($description);
		$course->setCreated_at($created_at);
		$course->setUpdated_at($updated_at);
        $course->save();

        header('Location: index.php?controller=course&action=index');
    }

    // Display the article editing form
    public function edit()
    {
        $id = $_GET['id'];
        $course = Course::getById($id);
        require 'views/courses/edit.php';
    }

    // Update the specified article in the database
    public function update()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
		$created_at = $_POST['created_at'];
		$updated_at = $_POST['updated_at'];

        $course = new Course();
        $course->setId($id);
        $course->setTitle($title);
        $course->setDescription($description);
		$course->setCreated_at($created_at);
		$course->setUpdated_at($updated_at);
        $course->update();

        header('Location: index.php?controller=course&action=index');
    }

    // Delete the specified article from the database
    public function delete()
    {
        $id = $_GET['id'];
        $course = new Course();
        $course->setId($id);
        $course->delete();

        header('Location: index.php?controller=course&action=index');
    }
}
?>
