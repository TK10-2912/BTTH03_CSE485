<?php
require_once(__DIR__ ."/../config.php");

class Lesson
{
    private $id;
    private $course_id;
    private $title;
    private $description;
    private $create_at;
    private $update_at;
    private $db;


    public function __construct()
    {
        // Initialize database connection
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getAll()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->query('SELECT * FROM lessons');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT * FROM lessons WHERE id = :id');
        $query->bindParam(':id',$id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCourseID($course_id)
    {
        $this->course_id = $course_id;
    }

    public function setTitle($title){
        $this->title = $title;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setCreate_at($create_at){
        $this->create_at = $create_at;
    }
    public function setUpDate_at($update_at){
        $this->update_at = $update_at;
    }
    public function save()
    {
        $query = $this->db->prepare('INSERT INTO lessons (id, course_id, description) VALUES (:id, :course_id, :description)');
        $query->bindParam(':id', $this->id, PDO::PARAM_STR);
        $query->bindParam(':course_id', $this->course_id, PDO::PARAM_STR);
        $query->bindParam('title', $this->title, PDO::PARAM_STR);
        $query->bindParam('description', $this->description, PDO::PARAM_STR);
        $query->bindParam('create_at', $this->create_at,PDO::PARAM_STR);
        $query->bindParam('update_at', $this->update_at,PDO::PARAM_STR);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE lessons SET title = :title, content = :content WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':course_id', $this->course_id, PDO::PARAM_STR);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->bindParam('create_at', $this->create_at,    PDO::PARAM_STR);
        $query->bindParam('update_at', $this->update_at,    PDO::PARAM_STR);
        $query->execute();
    }
    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM lessons WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }

   
}
?>
