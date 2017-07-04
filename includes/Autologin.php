<?php

include_once 'Database.php';
include_once 'default.php';

class Autologin extends Database {



    public function saveToken($user_identifier) {
        $user_token = uniqid(rand(), TRUE);
        $hashed_token = password_hash($user_token, PASSWORD_DEFAULT);
        $query = "INSERT INTO `remebered_session`(`user_id`, `token`) VALUES ('$user_identifier','$hashed_token')";
        if(!$this->performQuery($query)){
            die($this->getMysqliError());
        }else{
            setcookie("autologin", "$user_identifier-$user_token", time() + 60 * 60 * 24 * 365,COOKIE_DIR,DOMAIN);
        }
        $lastId = $this->lastInsertedId();
        //it returns the last created id if it was created else false is returned
        return $lastId ? array($lastId,$user_identifier) : FALSE;
    }

    public function checkToken() {
        $info = explode('-', $_COOKIE['autologin']);
        $user_identifier = $info[0];
        $token = $info[1];
        $query = "SELECT `id`,`token` FROM `remebered_session` WHERE `user_id` = '$user_identifier';";
        if(!$this->performQuery($query)){
            die($this->getMysqliError());
        }
        $result = $this->fetchAll();
        if (!empty($result)) {
            $check = 0;
            $session_id = 0;
            foreach ($result as $row) {
                if (password_verify($token, $row['token'])) {
                    $check = 1;
                    $session_id = $row['id'];
                    break;
                }
            }
            if ($check) {
                $user_token = uniqid(rand(), TRUE);
                $hash_token = password_hash($user_token, PASSWORD_DEFAULT);
                $query = "UPDATE `remebered_session` SET `token`='$hash_token' WHERE `id` = '$session_id'";
                if ($this->performQuery($query)) {
                    setcookie("autologin", "$user_identifier-$user_token", time() + 60 * 60 * 24 * 365,COOKIE_DIR,DOMAIN);
                }
                return $user_identifier;
            } else {
                $query = "DELETE FROM `remebered_session` WHERE `user_id` = '$user_identifier'";
                $this->performQuery($query);
                $query = "UPDATE `user` SET `user_session_hijacked`= '1' WHERE `user_id` = '$user_identifier';";
                $this->performQuery($query);
                setcookie("autologin", "", time() - 60 * 60 * 24 * 365,COOKIE_DIR,DOMAIN);
                return FALSE;
            }
        }else{
            setcookie("autologin", "", time() - 60 * 60 * 24 * 365,COOKIE_DIR,DOMAIN);
        }
        return FALSE;
    }

    public static function deleteToken() {
        $info = explode('-', $_COOKIE['autologin']);
        $id = $info[0];
        $token = $info[1];
        $database = new Database();
        $query = "SELECT `id`,`token` FROM `remebered_session` WHERE `user_id` = '$id';";
        $database->performQuery($query);
        $result = $database->fetchAll();
        $session_id = 0;
        $check = 0;
        foreach ($result as $row) {
            if (password_verify($token, $row['token'])) {
                $check = 1;
                $session_id = $row['id'];
                break;
            }
        }
        if (check) {
            $id = $result[0]['id'];
            $query = "DELETE FROM `remebered_session` WHERE `id` = '$session_id'";
            $database->performQuery($query);
        }
        setcookie("autologin", "", time() - 60 * 60 * 24 * 365,COOKIE_DIR,DOMAIN);
    }

}
?>
