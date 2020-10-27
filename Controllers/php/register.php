<?php

class UserRegister {

    private $data;
    private $dbErrors = [];
    private static $fields = ['username', 'email', 'password', 'password2'];

    public function __construct($post_data){
        $this->data = $post_data;
    }

    public function Register(){
        $hashedPassword = password_hash($this->data['password'], PASSWORD_DEFAULT);
        $username = $this->data['username'];
        $email = $this->data['email'];

        require('db.php');
        try {
            ($database->query("INSERT INTO usrs VALUES (NULL, '$username', '$email', '$hashedPassword', 'user')"));
            echo "Success";
            $_SESSION['Just_registered'] = true;
            header('Location: /');
            exit();
        }
        catch (Exception $e) {
            echo "There was a problem with database. Developer info: " .$e;
        }
        $database->close();
    }
}

?>