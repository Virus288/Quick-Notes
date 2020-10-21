<?php

    class UserValidator {

        private $data;
        private $errors = [];
        private static $fields = ['username', 'email', 'password', 'password2'];

        public function __construct($post_data){
            $this->data = $post_data;
        }

        public function validateForm(){
            foreach(self::$fields as $field){
                if(!array_key_exists($field, $this->data)){
                  trigger_error("'$field' is not present");
                  return;
                }
              }
            $this->validateUsername();
            $this->validateEmail();
            $this->validatePassword();
            if($this->errors){
                return $this->errors;
            } else {
                $dbErrors = [];

                require_once('Controllers/php/register.php');
                $register = new UserRegister($_POST);
                $dbErrors = $register->Register();
                if($dbErrors){
                  echo $dbErrors;
                }
            }
            
        }

        private function validateUsername(){
            require('db.php');
            $val = trim($this->data['username']);

            if(empty($val)){
                $this->addError("username", 'username cannot be empty');
            } else {
                $results = $database->query("SELECT id FROM usrs WHERE name like '$val'");
                $database->close();
                if ($results->num_rows > 0) {
                    $this->addError("username", 'username already exists');
                } else {
                    if(!preg_match('/^[a-zA-Z0-9]{6,15}$/', $val)){
                        $this->addError('username', 'username must be 6 to 15 characters long, alphanumeric');
                    }
                }
            }
        }

        private function validateEmail(){
            require('db.php');
            $val = trim($this->data['email']);

            if(empty($val)){
                $this->addError("email", 'email cannot be empty');
            } else {
                $results = $database->query("SELECT id FROM usrs WHERE email like '$val'");
                $database->close();
                if ($results->num_rows > 0) {
                    $this->addError("email", 'email already exists');
                } else {
                    if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
                        $this->addError('email', 'email is invalid');
                    }
                }
            }
        }

        private function validatePassword(){
            $val = trim($this->data['password']);
            $val2 = trim($this->data['password2']);

            if(empty($val) || empty($val2)){
                $this->addError('password', 'Password cannot be empty');
            } else {
                if(strlen($val)<5){
                    $this->addError('password', 'Password is too small. It should be at least 5 characters');
                } else {
                    if($val !== $val2){
                        $this->addError('password', 'Passwords are not exual');
                    } else {
                        if(!preg_match('/\d/', $val)){
                            $this->addError('password', 'Password should contain at least 1 number');
                            }
                    }
                }
            }
            
        }

        private function addError($key, $val){
            $this->errors[$key] = $val;
        }

    }

?>