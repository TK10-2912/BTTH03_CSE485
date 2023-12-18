<?php
require_once(__DIR__ . '/../models/User.php');


class UserController
{
    // Display a list of articles
    public function index()
    {
        $users = User::getAll();
        require 'views/users/index.php';
    }

    // Display the article creation form
    public function create()
    {
        require 'views/users/create.php';
    }

    // Store a newly created article in the database
    public function store()
    {
        $name = $_POST['name'];
		$email = $_POST['email'];
        $password = $_POST['password'];
		$create_at = $_POST['create_at'];
		$update_at = $_POST['update_at'];

        $user = new User();
        $user->setName($name);
		$user->setEmail($email);
        $user->setPassword($password);
		$user->setCreate_at($create_at);
		$user->setUpdate_at($update_at);
        $user->save();

        header('Location: index.php?controller=user&action=index');
    }

    // Display the article editing form
    public function edit()
    {
        $id = $_GET['id'];
        $user = User::getById($id);
        require 'views/users/edit.php';
    }

    // Update the specified article in the database
    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $create_at = $_POST['create_at'];
        $update_at = $_POST['update_at'];

        $user = new User();
        $user->setId($id);
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setCreate_at($create_at);
        $user->setUpdate_at($update_at);
        $user->update();

        header('Location: index.php?controller=user&action=index');
    }

    // Delete the specified article from the database
    public function delete()
    {
        $id = $_GET['id'];
        $user = new User();
        $user->setId($id);
        $user->delete();

        header('Location: index.php?controller=user&action=index');
    }
}
?>
