<?php
require_once 'config.php';

class Options
{
    private $id;
    private $question_id;
    private $option;
    private $is_correct;
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

        $query = $db->query("SELECT options.id, questions.question as question_title, options.option,options.is_correct, questions.created_at, questions.updated_at FROM options JOIN questions ON options.question_id = questions.id");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $db->prepare('SELECT * FROM options WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }



    public function save()
    {
        $query = $this->db->prepare('INSERT INTO options (question_id,option,is_correct, created_at,updated_at) VALUES (:question_id,:option,:is_correct, :create_at,:update_at)');
        $query->bindParam(':question_id', $this->question_id, PDO::PARAM_STR);
        $query->bindParam(':option', $this->option, PDO::PARAM_STR);
        $query->bindParam(':is_correct', $this->is_correct, PDO::PARAM_STR);
        $query->bindParam(':create_at', $this->create_at, PDO::PARAM_STR);
        $query->bindParam(':update_at', $this->update_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE options SET question_id=:question_id, option = :option,is_correct:is_correct,updated_at = :update_at WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':question_id', $this->question_id, PDO::PARAM_STR);
        $query->bindParam(':option', $this->option, PDO::PARAM_STR);
        $query->bindParam(':update_at', $this->update_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM options WHERE id = :id');
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
     * Get the value of question_id
     */ 
    public function getQuestion_id()
    {
        return $this->question_id;
    }

    /**
     * Set the value of question_id
     *
     * @return  self
     */ 
    public function setQuestion_id($question_id)
    {
        $this->question_id = $question_id;

        return $this;
    }

    /**
     * Get the value of option
     */ 
    public function getOption()
    {
        return $this->option;
    }

    /**
     * Set the value of option
     *
     * @return  self
     */ 
    public function setOption($option)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * Get the value of is_correct
     */ 
    public function getIs_correct()
    {
        return $this->is_correct;
    }

    /**
     * Set the value of is_correct
     *
     * @return  self
     */ 
    public function setIs_correct($is_correct)
    {
        $this->is_correct = $is_correct;

        return $this;
    }
}
