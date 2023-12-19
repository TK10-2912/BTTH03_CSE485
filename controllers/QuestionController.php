<?php
require_once 'models/Question.php';

class QuestionController
{
    // Display a list of articles
    public function index()
    {
        $questions = Question::getAll();
        require 'views/Questions/index.php';
    }

    // Display the article creation form
    public function create()
    {
        require 'views/Questions/create.php';
    }

    // Store a newly created article in the database
    public function store()
    {
        $quiz_id = $_POST['quiz_id'];
        $question = $_POST['question'];
        $create_at = $_POST['create_at'];

        $questions = new Question();
        $questions->setQuiz_id($quiz_id);
        $questions->setQuestion($question);
        $questions->setCreate_at($create_at);
        $questions->setUpdate_at($create_at);
        $questions->save();

        header('Location: index.php?controller=question&action=index');
    }

    // Display the article editing form
    public function edit()
    {
        $id = $_GET['id'];
        $question = Question::getById($id);
        require 'views/Questions/edit.php';
    }

    // Update the specified article in the database
    public function update()
    {
        $id=$_POST['id'];
        $quiz_id = $_POST['quiz_id'];
        $question = $_POST['question'];
        $update_at = $_POST['update_at'];
        $questions = new Question();
        $questions->setId($id);
        $questions->setQuiz_id($quiz_id);
        $questions->setQuestion($question);
        $questions->setUpdate_at($update_at);
        $questions->update();

        header('Location: index.php?controller=question&action=index');
    }

    // Delete the specified article from the database
    public function delete()
    {
        $id = $_GET['id'];
        $question = new Question();
        $question->setId($id);
        $question->delete();

        header('Location: index.php?controller=question&action=index');
    }
}
