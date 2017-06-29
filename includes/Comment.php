<?php

/**
 * @author: Omar Tuffaha <omar_tuffaha@hotmail.com>
 * @description: This is a class that will all movements on Comment
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @Class: Comment
 *
 */
include_once 'Database.php';

class Comment extends Database {

    private $author;
    private $email;
    private $content;
    private $status;

    function setAuthor($author) {
        $this->author = $this->run_mysql_real_escape_string($author);
    }

    function setEmail($email) {
        $this->email = $this->run_mysql_real_escape_string($email);
    }

    function setContent($content) {
        $this->content = $this->run_mysql_real_escape_string($content);
    }

    public function fetchAll() {
        $query = "SELECT `comment_id`, `comment_post_id`,`post_title`,`post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date` FROM `comment` JOIN `posts` ON `post_id` = `comment_post_id` ORDER BY `comment_date` DESC;";
        if ($this->performQuery($query)) {
            return parent::fetchAll();
        } else {
            return NULL;
        }
    }

    public function deleteComment($id) {
        $id = $this->run_mysql_real_escape_string($id);
        $query = "DELETE FROM `comment` WHERE `comment_id` = '$id';";
        if ($this->performQuery($query)) {
            return parent::fetchAll();
        } else {
            return NULL;
        }
    }

    public function fetchByPost($id) {
        $id = $this->run_mysql_real_escape_string($id);
        $query = "SELECT `comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date` FROM `comment` JOIN `posts` ON `post_id` = `comment_post_id` AND `post_id` = '$id' AND `comment_status` = 'approved' ORDER BY `comment_date` DESC;";
        if ($this->performQuery($query)) {
            return parent::fetchAll();
        } else {
            return NULL;
        }
    }

    public function createComment($id) {
        $id = $this->run_mysql_real_escape_string($id);
        $query = "INSERT INTO `comment`(`comment_post_id`, `comment_author`, `comment_email`, `comment_content`) VALUES ('$id','$this->email','$this->email','$this->content');";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        }
    }
    
    public function approveOrDenyComment($id,$status) {
        $id = $this->run_mysql_real_escape_string($id);
        $status = $this->run_mysql_real_escape_string($status);
        
        $query = "UPDATE `comment` SET `comment_status`='$status' WHERE `comment_id` = '$id';";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        }
    }

}
