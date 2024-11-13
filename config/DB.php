<?php

class DB
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db_name = 'hr_db';

    public function connect()
    {
        try {
            $pdo = new PDO("mysql:host=$this->host; dbname=$this->db_name", $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}