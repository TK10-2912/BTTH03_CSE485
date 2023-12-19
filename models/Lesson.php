<?php
require_once(__DIR__ . '/../config.php');

class Lesson
{
    private $id;
    private $course_id;
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
    public function setCourse_id($course_id)
    {
        $this->course_id = $course_id;
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
    public function getCourse_id()
    {
        return $this->course_id;
    }

    public function save()
    {
        $query = $this->db->prepare('INSERT INTO lessons (course_id, title, description, created_at, updated_at) VALUES (:course_id, :title, :description, :created_at, :updated_at)');
        $query->bindParam(':course_id', $this->course_id, PDO::PARAM_STR);
		$query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
		$query->bindParam(':created_at', $this->created_at, PDO::PARAM_STR);
        $query->bindParam(':updated_at', $this->updated_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE lessons SET course_id = :course_id, title = :title, description = :description, updated_at = :updated_at WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_STR);
        $query->bindParam(':course_id', $this->course_id, PDO::PARAM_STR);
		$query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->bindParam(':updated_at', $this->updated_at, PDO::PARAM_STR);
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
