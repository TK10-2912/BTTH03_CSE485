<?php
require_once 'models/material.php';

class MaterialController
{
    // Display a list of articles
    public function index()
    {
        $materials = Material::getAll();
        require 'views/material/index.php';
    }

    // Display the article creation form
    public function create()
    {
        require 'views/materials/create.php';
    }

    // Store a newly created article in the database
    public function store()
    {
        $title = $_POST['title'];
        $lesson_id = $_POST['lesson_id'];
        $create_at = $_POST['create_at'];
        $update_at = $_POST['update_at'];

        $material = new Material();
        $material->setTitle($title);
        $material->setLesson_id($lesson_id);
        $material->setCreate_at($create_at);
        $material->setUpdate_at($update_at);
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
        $title = $_POST['title'];
        $lesson_id = $_POST['lesson_id'];
        $create_at = $_POST['create_at'];
        $update_at = $_POST['update_at'];
        $material = new Material();
        $material->setId($id);
        $material->setTitle($title);
        $material->setLesson_id($lesson_id);
        $material->setCreate_at($create_at);
        $material->setUpdate_at($update_at);
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
