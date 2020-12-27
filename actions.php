<?php
    class InfoToUserDatabase{
        public function __construct()
        {
            $this->content = json_decode(file_get_contents('../../database/user-database.json'), true);
        }

        public function getRequestINFO()
        {
            $this->username = $_POST['username'];
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $this->confirm_password = $_POST['confirm_password'];
        }

        public function setID()
        {
            if (isset($this->content['id'])) {
                $this->content['id'] = (int)$this->content['id'] + 1;
            } else {
                $this->content['id'] = 1;
            }
        }

        public function writeToDATABASE()
        {
            $this->setID();
            $this->content[$this->content['id']]['username'] = $this->username;
            $this->content[$this->content['id']]['email'] = $this->email;
            $this->content[$this->content['id']]['password'] = $this->password;
            file_put_contents('../../database/user-database.json', json_encode($this->content, JSON_PRETTY_PRINT));
        }
    }

?>