<?php
// require_once('../mail/OTP.php');

class Authentication extends DB
{
    private $con;

    public function __construct()
    {
        $this->con = $this->connect();
    }

    public function login($post) {
        try {
            $selectSql = "SELECT * FROM `employees` WHERE `email`=:email AND `deleted_at` IS NULL";
            $stmt = $this->con->prepare($selectSql);
            $stmt->bindParam('email', $post['email'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                $user_data =  $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user_data) {
                    if(password_verify($post['password'], $user_data['password'])) {
                        session_regenerate_id(true);
                        if (isset($post['remember_me'])) {
                            $updateSQL = "UPDATE `employees` SET `remember_token`=:remember_me WHERE `email`=:email";
                            $token = bin2hex(random_bytes(16));
                            setcookie('remember_token', $token, time() + (3600 * 24 * 7), "/", "", true, true);
                            $stmt = $this->con->prepare($updateSQL);
                            $stmt->bindParam('remember_me', $token, PDO::PARAM_STR);
                            $stmt->bindParam('email', $post['email'], PDO::PARAM_STR);
                            $stmt->execute();
                        }
                        $_SESSION['temp_user'] = [
                            'id' => $user_data['id'], 
                            'email' => $user_data['email'], 
                            'employee_code' => $user_data['employee_code']
                        ];
                        $this->generateCode();
                        // array_merge($_SESSION['temp_user'], ['code' => $this->generateCode()]);
                        $this->sendMail($_SESSION['temp_user']);
                        // echo "<script> location.href = '/2FA' </script>";
                        return true;
                    } else {
                        echo 'invalid pwd!';
                    }
                } else {
                    echo 'Invalid User!';
                }
            }
        }  catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }   
    }

    public function checkRemember() {
        try {
            $selectQuery = "SELECT * FROM `employees` WHERE `remember_token`=:token AND `deleted_at` IS NULL";
            $stmt = $this->con->prepare($selectQuery);
            $stmt->bindParam('token', $_COOKIE['remember_token'], PDO::PARAM_STR);
            var_dump('token has');
            $stmt->execute();
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['temp_user'] = [$user_data['id'], $user_data['email'], $user_data['employee_code']];
            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    private function generateCode($length = 4) {
        try {

            $otp = '';
            for ($i = 0; $i < $length; $i++) {
                $otp .= mt_rand(0, 9);  // mt_rand() generates a random number from 0 to 9
            }
            $_SESSION['otp'] = $otp;
            return true;

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function sendMail($user_data) {
        try {
            require_once('app/mail/OTP.php');
            $mail = new OTP();
            $mail->sendOTP($user_data);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function verifyOTP($post) {
        try {
            // $this->generateCode();
            $otp = $_SESSION['otp'];
            if (isset($otp) && $post['otp']) {
                if ($otp == $post['otp']) {
                    echo 'match';
                } else {
                    echo 'not match';
                }
            }
        }  catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


}