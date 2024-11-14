<?php

class Authentication extends DB
{
    private $con;

    public function __construct()
    {
        $this->con = $this->connect();
    }

    public function login($post) {
        $selectSql = "SELECT * FROM `employees` WHERE `email`=:email AND `deleted_at` IS NULL";
        $stmt = $this->con->prepare($selectSql);
        $stmt->bindParam('email', $post['email'], PDO::PARAM_STR);
        if ($stmt->execute()) {
            $user_data =  $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user_data) {
                // var_dump($user_data);
                if(password_verify($post['password'], $user_data['password'])) {
                    // var_dump($user_data);
                } else {
                    echo 'invalid pwd!';
                }
            } else {
                echo 'Invalid User!';
            }
        }
        
    }


}