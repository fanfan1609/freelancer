<?php
define("DB","localhost");
define("DB_NAME","survey");
define("USR","root");
define("PWD","");

//$db = new PDO(sprintf('mysql:host=%s;dbname=%s;charset=utf8', '%s', '%s',DB,DB_NAME,USR,PWD));
class DB 
{
	private $_db;
	function __construct()
	{
		$this->_db = new PDO(sprintf('mysql:host=%s;dbname=%s;charset=utf8',DB,DB_NAME),USR,PWD);
	}

	/**
	 * Get question content
	 * @param   $question_id [description]
	 * @return mixed 
	 */
	function getQuestion($question_id) 
	{
		$query = $this->_db->prepare("SELECT * FROM questions WHERE is_deleted = 0 AND id = :id");
		$query->bindValue(':id',$question_id);
		$query->execute();

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	/**
	 * get Answers of questions
	 * @param  integer $question_id Question ID
	 * @return mixed
	 */
	function getAnswers($question_id)
	{
		$query = $this->_db->prepare("SELECT * FROM answers WHERE is_deleted = 0 AND question_id = :question_id");
		$query->bindValue(':question_id',$question_id);
		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * Get total question 
	 * @return int
	 */
	function countQuestion()
	{
		$query = $this->_db->prepare("SELECT count(id) as total FROM questions");
		$query->execute();

		$result = $query->fetch(PDO::FETCH_ASSOC);
		return $result['total'];
	}
}
