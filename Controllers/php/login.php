<?php

class UserLogin {

    private $data;
    private $errors = [];
    private static $fields = ['username', 'password'];

    public function __construct($post_data){
        $this->data = $post_data;
    }

    public function Login(){
        require('db.php');

        $username = $this->data['username'];
        $query = $database->query("SELECT * FROM usrs WHERE username like '$username'");
        $Data = $query->fetch_assoc();



        $this->CheckForUsers($Data);
        $this->ValidatePassword($Data);

        $database -> close();

        if($this->errors){
                return $this->errors;
            } else {
            $_SESSION['Just_logged_in'] = true;
            header('Location: /');
            exit();
        }
    }

    private function CheckForUsers($Data){
		  if(!$Data['username'])
		  {
              $this->addError("username", 'Invalid username');
		  }
    }

    private function ValidatePassword($Data){
        if (password_verify($this->data['password'], $Data['password']))
        {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['id'] = $Data['id'];
            $_SESSION['username'] = $Data['username'];
            $_SESSION['role'] = $Data['role'];
        } else {
            $this->addError("password", 'Invalid password');
        }
    }

    private function addError($key, $val){
        $this->errors[$key] = $val;
    }

}
?>