<?php
require_once(__DIR__ . '/../config.php');

class User
{
    private $name;
    private $password;
	private $db;
	private $id;
	private $email;
	private $create_at;
	private $update_at;
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

	public function setCreate_at($create_at)
	{
		$this->create_at = $create_at;
	}

	public function setUpdate_at($update_at)
	{
		$this->update_at = $update_at;
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

	public function getCreate_at()
	{
		return $this->create_at;
	}

	public function getUpdate_at()
	{
		return $this->update_at;
	}

    public function save()
    {
        $query = $this->db->prepare('INSERT INTO users (name, email, password, created_at, updated_at) VALUES (:name, :email, :password, :create_at, :update_at)');
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
		$query->bindParam(':email', $this->email, PDO::PARAM_STR);
        $query->bindParam(':password', $this->password, PDO::PARAM_STR);
		$query->bindParam(':create_at', $this->create_at, PDO::PARAM_STR);
        $query->bindParam(':update_at', $this->update_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE users SET name = :name, email = :email, password = :password, updated_at = :update_at WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
		$query->bindParam(':email', $this->email, PDO::PARAM_STR);
        $query->bindParam(':password', $this->password, PDO::PARAM_STR);
        $query->bindParam(':update_at', $this->update_at, PDO::PARAM_STR);
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
