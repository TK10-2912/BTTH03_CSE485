<?php
require_once 'models/material.php';

class MaterialController
{
    // Display a list of articles
    public function index()
    {
        $materials = Material::getAll();
        require 'views/materials/index.php';
    }

    // Display the article creation form
    public function create()
    {
        require 'views/materials/create.php';
    }

    // Store a newly created article in the database
    public function store()
    {
        $lesson_id = $_POST['lesson_id'];
        $title = $_POST['title'];
        $file_path = $_POST['file_path'];
        $created_at = $_POST['created_at'];
        $updated_at = $_POST['updated_at'];

        $material = new Material();
        $material->setLesson_id($lesson_id);
        $material->setTitle($title);
        $material->setFile_path($file_path);
        $material->setCreated_at($created_at);
        $material->setUpdated_at($updated_at);
        $material->save();

        header('Location: index.php?controller=material&action=index');
    }

    // Display the article editing form
    public function edit()
    {
        $id = $_GET['id'];
        $material = Material::getById($id);
        require 'views/materials/edit.php';
    }

    // Update the specified article in the database
    public function update()
    {
        $id = $_POST['id'];
        $lesson_id = $_POST['lesson_id'];
        $title = $_POST['title'];
        $file_path = $_POST['file_path'];
        $created_at = $_POST['created_at'];
        $updated_at = $_POST['updated_at'];
        $material = new Material();
        $material->setId($id);
        $material->setLesson_id($lesson_id);
        $material->setTitle($title);
        $material->setFile_path($file_path);
        $material->setCreated_at($created_at);
        $material->setUpdated_at($updated_at);
        $material->update();

        header('Location: index.php?controller=material&action=index');
    }

    // Delete the specified article from the database
    public function delete()
    {
        $id = $_GET['id'];
        $material = new Material();
        $material->setId($id);
        $material->delete();

        header('Location: index.php?controller=material&action=index');
    }
}
