<?php
require_once 'config.php';

class Question
{
    private $id;
    private $quiz_id;
    private $question;
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

        $query = $db->query("SELECT questions.id, quizzes.title as quizzes_title, questions.question, questions.created_at, questions.updated_at FROM questions
        JOIN quizzes ON questions.quiz_id = quizzes.id");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $db->prepare('SELECT * FROM questions WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }



    public function save()
    {
        $query = $this->db->prepare('INSERT INTO questions (quiz_id,question, created_at,updated_at) VALUES (:quiz_id,:question, :create_at,:update_at)');
        $query->bindParam(':quiz_id', $this->quiz_id, PDO::PARAM_STR);
        $query->bindParam(':question', $this->question, PDO::PARAM_STR);
        $query->bindParam(':create_at', $this->create_at, PDO::PARAM_STR);
        $query->bindParam(':update_at', $this->update_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE questions SET quiz_id=:quiz_id, question = :question,updated_at = :update_at WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':quiz_id', $this->quiz_id, PDO::PARAM_STR);
        $query->bindParam(':question', $this->question, PDO::PARAM_STR);
        $query->bindParam(':update_at', $this->update_at, PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM questions WHERE id = :id');
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
     * Get the value of quiz_id
     */ 
    public function getQuiz_id()
    {
        return $this->quiz_id;
    }

    /**
     * Set the value of quiz_id
     *
     * @return  self
     */ 
    public function setQuiz_id($quiz_id)
    {
        $this->quiz_id = $quiz_id;

        return $this;
    }

    /**
     * Get the value of question
     */ 
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set the value of question
     *
     * @return  self
     */ 
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }
}
