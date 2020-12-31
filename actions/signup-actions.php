<?php
    class InfoToUserDb{
        public $errors = [];

        public function __construct()
        {
            $this->content = json_decode(file_get_contents('../../database/user-database.json'), true);
        }

        public function getPostRequestINFO()
        {   
            define('REQUIRED_FIELD', 'This field is required');

            $this->username = $_POST['username'];
            $this->email = $_POST['email'];
            $this->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $this->confirm_password = password_verify($_POST['confirm_password'], $this->password);

            // Validation
            if (!strlen($this->username)){
                $this->errors['username'] = REQUIRED_FIELD;
            }

            if (!strlen($this->email)){
                $this->errors['email'] = REQUIRED_FIELD;
            } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $this->errors['email'] = 'Invalid Email';
            }

            if (!strlen($this->password)){
                $this->errors['password'] = REQUIRED_FIELD;
            }

            if (!strlen($this->confirm_password)){
                $this->errors['confirm_password'] = REQUIRED_FIELD;
            }

            if ($this->confirm_password != 1){
                $this->errors['compare_password'] = 'Passwords do not Match!';
            }
            // echo var_dump($this->errors);
        }

        public function setID()
        {
            if (isset($this->content['id'])) {
                return $this->content['id'] = (int)$this->content['id'] + 1;
            } else {
                return $this->content['id'] = 1;
            }
        }

        public function writeToDB()
        {
            if (!sizeof($this->errors)){
                $ID = $this->setID();
                $this->content[$this->content['id']]['username'] = $this->username;
                $this->content[$this->content['id']]['email'] = $this->email;
                $this->content[$this->content['id']]['password'] = $this->password;
                
                $lastestInfoAddedToDb = $this->content[$ID-1];
                $InfoToBeAddedToDb = $this->content[$ID];

                if ($InfoToBeAddedToDb != $lastestInfoAddedToDb){
                    file_put_contents('../../database/user-database.json', json_encode($this->content, JSON_PRETTY_PRINT));
                }
            }   
        }
    }

?>