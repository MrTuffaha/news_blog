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

    public function setUsername($username) {
        $this->username = $this->run_mysql_real_escape_string($username);
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setFirstname($firstname) {
        $this->firstname = $this->run_mysql_real_escape_string($firstname);
    }

    public function setLastname($lastname) {
        $this->lastname = $this->run_mysql_real_escape_string($lastname);
    }

    public function setEmail($email) {
        $this->email = $this->run_mysql_real_escape_string($email);
    }

    public function setRole($role) {
        $this->role = $this->run_mysql_real_escape_string($role);
    }

    public function setImageName($imageName) {
        $imageName = strtolower($imageName);
        $tmp = explode('.', $imageName);
        $ext = end($tmp);
        $imageName = uniqid("img_") . "." . $ext;
        $this->imageName = "images/" . $imageName;
    }

    public function setImageContent($imageContent) {
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

    private function checkId($id){
        $query = "SELECT `user_id` FROM `user` WHERE `user_id` = '$id';";
        var_dump($query);
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        }
        $result = parent::fetchAll()[0];
        return $result? FALSE:TRUE;
    }

    public function createUser() {
        $user_id = uniqid(rand(), TRUE);
        while (!$this->checkId($user_id)) {
            $user_id = uniqid(rand(), TRUE);
        }
        $query = "INSERT INTO `user`( `user_id`,`user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randSalt`) "
                . "VALUES ('$user_id','$this->username','$this->password','$this->firstname','$this->lastname','$this->email','$this->imageName','$this->role','');";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        } else {
            if (!empty($this->imageName)) {
                move_uploaded_file($this->imageContent, FILE_DIR . $this->imageName);
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
        $query = "UPDATE `user` SET `user_name`='$this->username',`user_firstname`='$this->firstname',`user_lastname`='$this->lastname',`user_email`='$this->email',`user_role`='$this->role' ";

        if(!empty($this->imageName)){
            $query .= ",`user_image`='$this->imageName'";
        }
        $query .= " WHERE `user_id` = '$id';";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        }else{
            if(!empty($this->imageName)){
                move_uploaded_file($this->imageContent, FILE_DIR . $this->imageName);
            }
        }
    }

    public function auth($username, $password,$remeberMe) {
        $username = $this->run_mysql_real_escape_string($username);
        $password = $this->run_mysql_real_escape_string($password);
        $query = "SELECT `user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randSalt` FROM `user` WHERE `user_name` = '$username'";
        if ($this->performQuery($query)) {
            $thisUser = parent::fetchAll()[0];
            if (empty($thisUser)) {
                return FALSE;
            } else {
                if (password_verify($password, $thisUser['user_password'])) {
                    if($remeberMe){
                        include_once "Autologin.php";
                        $autologin = new Autologin();
                        $autologin->saveToken($thisUser['user_id']);
                    }
                    return $thisUser;
                } else {
                    return FALSE;
                }
            }
        }
    }

}
