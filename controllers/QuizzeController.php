<?php
require_once 'models/Quizze.php';

class QuizzeController
{
    // Display a list of articles
    public function index()
    {
        $quizzes = Quizze::getAll();
        require 'views/Quizzes/index.php';
    }

    // Display the article creation form
    public function create()
    {
        require 'views/Quizzes/create.php';
    }

    // Store a newly created article in the database
    public function store()
    {
        $title = $_POST['title'];
        $lesson_id = $_POST['lesson_id'];
        $create_at = $_POST['create_at'];
        $update_at = $_POST['update_at'];

        $quizze = new Quizze();
        $quizze->setTitle($title);
        $quizze->setLesson_id($lesson_id);
        $quizze->setCreate_at($create_at);
        $quizze->setUpdate_at($create_at);
        $quizze->save();

        header('Location: index.php?controller=quizze&action=index');
    }

    // Display the article editing form
    public function edit()
    {
        $id = $_GET['id'];
        $quizze = Quizze::getById($id);
        require 'views/Quizzes/edit.php';
    }

    // Update the specified article in the database
    public function update()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $lesson_id = $_POST['lesson_id'];
        $create_at = $_POST['create_at'];
        $update_at = $_POST['update_at'];
        $quizze = new Quizze();
        $quizze->setId($id);
        $quizze->setTitle($title);
        $quizze->setLesson_id($lesson_id);
        $quizze->setCreate_at($create_at);
        $quizze->setUpdate_at($update_at);
        $quizze->update();

        header('Location: index.php?controller=quizze&action=index');
    }

    // Delete the specified article from the database
    public function delete()
    {
        $id = $_GET['id'];
        $quizze = new Quizze();
        $quizze->setId($id);
        $quizze->delete();

        header('Location: index.php?controller=quizze&action=index');
    }
}
