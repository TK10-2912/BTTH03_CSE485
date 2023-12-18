<?php
require_once(__DIR__ . '/../config.php');

class User
{
    private $name;
    private $password;
	private $db;
	private $id;
	private $email;
	private $created_at;
	private $updated_at;
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

        $query = $db->query('SELECT * FROM users');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindParam(':id',$id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

	public function setId($id)
	{
		$this->id = $id;
	}

    public function setName($name)
    {
        $this->name = $name;
    }

	public function setEmail($email)
	{
		$this->email = $email;
	}

    public function setPassword($password)
    {
        $this->password = $password;
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

    public function getName()
    {
        return $this->name;
    }

	public function getEmail()
	{
		return $this->email;
	}
    public function getPassword()
    {
        return $this->password;
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
        $query = $this->db->prepare('INSERT INTO users (name, email, password, created_at, updated_at) VALUES (:name, :email, :password, :created_at, :updated_at)');
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
		$query->bindParam(':email', $this->email, PDO::PARAM_STR);
        $query->bindParam(':password', $this->password, PDO::PARAM_STR);
		$query->bindParam(':created_at', $this->created_at, PDO::PARAM_STR);
        $query->bindParam(':update_at', $this->updated_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE users SET name = :name, email = :email, password = :password, created_at = :created_at, updated_at = :updated_at WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
		$query->bindParam(':email', $this->email, PDO::PARAM_STR);
        $query->bindParam(':password', $this->password, PDO::PARAM_STR);
		$query->bindParam(':created_at', $this->created_at, PDO::PARAM_STR);
        $query->bindParam(':update_at', $this->updated_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }
}
?>
