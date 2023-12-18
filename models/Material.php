<?php
require_once 'config.php';

class Material
{
    private $id;
    private $lesson_id;
    private $title;
    private $file_path;
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

        $query = $db->query("SELECT materials.id, materials.title, materials.lesson_id, materials.title, materials.file_path as lesson_title, materials.created_at, materials.updated_at, materials.file_path FROM materials
        JOIN lessons ON materials.lesson_id = lessons.id");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT * FROM materials WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }



    public function save()
    {
        $query = $this->db->prepare('INSERT INTO materials (id, lesson_id,title, file_path, created_at,updated_at) VALUES (:id, :lesson_id,:title, :file_path :create_at,:update_at)');
        $query->bindParam(':lesson_id', $this->lesson_id, PDO::PARAM_STR);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':file_path', $this->file_path, PDO::PARAM_STR);
        $query->bindParam(':create_at', $this->create_at, PDO::PARAM_STR);
        $query->bindParam(':update_at', $this->update_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE materials SET lesson_id=:lesson_id, title = :title,updated_at = :update_at WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':lesson_id', $this->lesson_id, PDO::PARAM_STR);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam('file_path', $this->file_path,    PDO::PARAM_STR);
        $query->bindParam(':update_at', $this->update_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM materials WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of lesson_id
     */ 
    public function getLesson_id()
    {
        return $this->lesson_id;
    }

    /**
     * Set the value of lesson_id
     *
     * @return  self
     */ 
    public function setLesson_id($lesson_id)
    {
        $this->lesson_id = $lesson_id;

        return $this;
    }

    /**
     * Get the value of create_at
     */ 
    public function getCreate_at()
    {
        return $this->create_at;
    }

    /**
     * Set the value of create_at
     *
     * @return  self
     */ 
    public function setCreate_at($create_at)
    {
        $this->create_at = $create_at;

        return $this;
    }

    /**
     * Get the value of update_at
     */ 
    public function getUpdate_at()
    {
        return $this->update_at;
    }

    /**
     * Set the value of update_at
     *
     * @return  self
     */ 
    public function setUpdate_at($update_at)
    {
        $this->update_at = $update_at;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
}
