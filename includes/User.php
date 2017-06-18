<?php

include_once 'Database.php';

class User extends Database {

    private $username;
    private $password;
    private $firstname;
    private $lastname;
    private $email;
    private $role;
    private $imageName;
    private $imageContent;

    function setUsername($username) {
        $this->username = $this->run_mysql_real_escape_string($username);
    }

    function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    function setFirstname($firstname) {
        $this->firstname = $this->run_mysql_real_escape_string($firstname);
    }

    function setLastname($lastname) {
        $this->lastname = $this->run_mysql_real_escape_string($lastname);
    }

    function setEmail($email) {
        $this->email = $this->run_mysql_real_escape_string($email);
    }

    function setRole($role) {
        $this->role = $this->run_mysql_real_escape_string($role);
    }

    function setImageName($imageName) {
        $imageName = strtolower($imageName);
        $tmp = explode('.', $imageName);
        $ext = end($tmp);
        $imageName = uniqid("img_") . "." . $ext;
        $this->image_name = "images/" . $imageName;
    }

    function setImageContent($imageContent) {
        $this->imageContent = $imageContent;
    }

    public function fetchAll() {
        $query = "SELECT `user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randSalt` FROM `user`";
        if ($this->performQuery($query)) {
            return parent::fetchAll();
        } else {
            return NULL;
        }
    }

    public function fetchById($id) {
        $query = "SELECT `user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randSalt` FROM `user` WHERE `user_id` = '$id';";
        if ($this->performQuery($query)) {
            return parent::fetchAll()[0];
        } else {
            return NULL;
        }
    }

    public function createUser() {
        $query = "INSERT INTO `user`( `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randSalt`) "
                . "VALUES ('$this->username','$this->password','$this->firstname','$this->lastname','$this->email','$this->imageName','$this->role','');";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        } else {
            if (!empty($this->imageName)) {
                move_uploaded_file($this->imageContent, DIR . $this->imageContent);
            }
        }
    }

    public function changeRole($id, $role) {
        $id = $this->run_mysql_real_escape_string($id);
        $role = $this->run_mysql_real_escape_string($role);
        $query = "UPDATE `user` SET `user_role` = '$role' WHERE `user_id` = '$id';";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        }
    }

    public function deleteUser($id) {
        $id = $this->run_mysql_real_escape_string($id);
        $query = "DELETE FROM `user` WHERE `user_id` = '$id'";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        }
    }

    public function updateUser($id) {
        $id = $this->run_mysql_real_escape_string($id);
        $query = "DELETE FROM `user` WHERE `user_id` = '$id'";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        }
    }

    public function auth($username, $password) {
        $username = $this->run_mysql_real_escape_string($username);
        $password = $this->run_mysql_real_escape_string($password);
        $query = "SELECT `user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randSalt` FROM `user` WHERE `user_name` = '$username'";
        if ($this->performQuery($query)) {
            $thisUser = parent::fetchAll()[0];
            if (empty($thisUser)) {
                return FALSE;
            } else {
                if (password_verify($password, $thisUser['user_password'])) {
                    return $thisUser;
                } else {
                    return FALSE;
                }
            }
        }
    }

}
