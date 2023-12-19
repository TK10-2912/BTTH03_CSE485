<?php
require_once(__DIR__ . '/../config.php');

class Material
{
    private $id;
    private $lesson_id;
	private $title;
	private $file_path;
	private $created_at;
	private $updated_at;
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

        $query = $db->query('SELECT * FROM materials');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT * FROM materials WHERE id = :id');
        $query->bindParam(':id',$id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

	public function setId($id)
	{
		$this->id = $id;
	}

    public function setTitle($title)
    {
        $this->title = $title;
    }

	public function setLesson_id($lesson_id)
	{
		$this->lesson_id = $lesson_id;
	}
    public function setFile_path($file_path)
	{
		$this->file_path = $file_path;
	}

	public function setCreated_at($created_at)
	{
		$this->created_at = $created_at;
	}

	public function setUpdated_at($updated_at)
	{
		$this->updated_at = $updated_at;
	}

	public function getId()
	{
		return $this->id;
	}

    public function getTitle()
    {
        return $this->title;
    }

	public function getLesson_id()
	{
		return $this->lesson_id;
	}
	public function getFile_path()
	{
		return $this->file_path;
	}    
	public function getCreated_at()
	{
		return $this->created_at;
	}

	public function getUpdated_at()
	{
		return $this->updated_at;
	}

    public function save()
    {
        $query = $this->db->prepare('INSERT INTO materials (id, lesson_id, title, file_path, created_at, updated_at) VALUES (:id, :lesson_id, :title, :file_path, :created_at, :updated_at)');
        $query->bindParam(':id', $this->id, PDO::PARAM_STR);
        $query->bindParam(':lesson_id', $this->title, PDO::PARAM_STR);
		$query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':file_path', $this->file_path, PDO::PARAM_STR);
		$query->bindParam(':created_at', $this->created_at, PDO::PARAM_STR);
        $query->bindParam(':updated_at', $this->updated_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE materials SET lesson_id = :lesson_id, title = :title, file_path = :filepath, updated_at = :updated_at WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_STR);
        $query->bindParam(':lesson_id', $this->title, PDO::PARAM_STR);
		$query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':file_path', $this->file_path, PDO::PARAM_STR);
        $query->bindParam(':updated_at', $this->updated_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM materials WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }
}
?>
