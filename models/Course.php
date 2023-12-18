<?php
require_once(__DIR__ . '/../config.php');

class Course
{
    private $id;
	private $title;
	private $description;
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

        $query = $db->query('SELECT * FROM courses');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT * FROM courses WHERE id = :id');
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

	public function setDescription($description)
	{
		$this->description = $description;
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

	public function getDescription()
	{
		return $this->description;
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
        $query = $this->db->prepare('INSERT INTO courses (id, title, description, created_at, updated_at) VALUES (:id, :title, :description, :created_at, :updated_at)');
        $query->bindParam(':id', $this->id, PDO::PARAM_STR);
		$query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
		$query->bindParam(':created_at', $this->created_at, PDO::PARAM_STR);
        $query->bindParam(':update_at', $this->updated_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE courses SET title = :title, description = :description, created_at = :created_at, updated_at = :updated_at WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_STR);
		$query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
		$query->bindParam(':created_at', $this->created_at, PDO::PARAM_STR);
        $query->bindParam(':update_at', $this->updated_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM courses WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }
}
?>
