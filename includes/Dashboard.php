<?php

include_once 'Database.php';


class Dashboard extends Database{
    public function countPosts(){
        $query = "SELECT COUNT(post_id) AS `count` FROM `posts`;";
        if ($this->performQuery($query)) {
            return $this->fetchAll()[0]['count'];
        } else {
            return NULL;
        }
    }
    public function countPostDrafts(){
        $query = "SELECT COUNT(post_id) AS `count` FROM `posts` WHERE `post_status` = 'draft';";
        if ($this->performQuery($query)) {
            return $this->fetchAll()[0]['count'];
        } else {
            return NULL;
        }
    }
    public function countPostPublished(){
        $query = "SELECT COUNT(post_id) AS `count` FROM `posts` WHERE `post_status` = 'published';";
        if ($this->performQuery($query)) {
            return $this->fetchAll()[0]['count'];
        } else {
            return NULL;
        }
    }

    public function countUsers(){
        $query = "SELECT COUNT(`user_id`) AS `count` FROM `user`;";
        if ($this->performQuery($query)) {
            return $this->fetchAll()[0]['count'];
        } else {
            return NULL;
        }
    }

    public function countScribers(){
        $query = "SELECT COUNT(`user_id`) AS `count` FROM `user`;";
        if ($this->performQuery($query)) {
            return $this->fetchAll()[0]['count'];
        } else {
            return NULL;
        }
    }

    public function countComments(){
        $query = "SELECT COUNT(`comment_id`) AS `count` FROM `comment`;";
        if ($this->performQuery($query)) {
            return $this->fetchAll()[0]['count'];
        } else {
            return NULL;
        }
    }

    public function countCommentPending(){
        $query = "SELECT COUNT(`comment_id`) AS `count` FROM `comment` WHERE `comment_status` = 'pending';";
        if ($this->performQuery($query)) {
            return $this->fetchAll()[0]['count'];
        } else {
            return NULL;
        }
    }

    public function countCategories(){
        $query = "SELECT COUNT(`category_id`) AS `count` FROM `category`;";
        if ($this->performQuery($query)) {
            return $this->fetchAll()[0]['count'];
        } else {
            return NULL;
        }
    }

}
 ?>
