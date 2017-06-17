<?php

/**
 * @author: Omar Tuffaha <omar_tuffaha@hotmail.com>
 * @description: This is a class that will all movements on Posts 
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @Class: Post
 */
require_once 'Database.php';

class Post extends Database {

    private $title;
    private $category;
    private $author;
    private $status;
    private $tags;
    private $content;
    private $image_name = '';
    private $image_content = '';

    function setTitle($title) {
        $this->title = $this->run_mysql_real_escape_string($title);
    }

    function setCategory($category) {
        $this->category = $this->run_mysql_real_escape_string($category);
    }

    function setAuthor($author) {
        $this->author = $this->run_mysql_real_escape_string($author);
    }

    function setStatus($status) {
        $this->status = $this->run_mysql_real_escape_string($status);
    }

    function setTags($tags) {
        $this->tags = $this->run_mysql_real_escape_string($tags);
        $this->tags = strtolower($this->tags);
        $this->tags = trim($this->tags);
    }

    function setContent($content) {
        $this->content = $this->run_mysql_real_escape_string($content);
    }

    function setImage_name($image_name) {
        $image_name = strtolower($image_name);
        $tmp = explode('.', $image_name);
        $image_name = uniqid("img_").".".$tmp[1];
        $this->image_name = "images/" . $image_name;
    }

    function setImage_content($image_content) {
        $this->image_content = $image_content;
    }

    /**
     * @@description: gets all the posts from the database
     * @return lists of post
     */
    public function fetchAll() {
        $query = "SELECT `post_id`, `category`.`category_title`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`,`post_comment_count`, `post_views_count`, `post_status` FROM `posts` LEFT JOIN `category` ON `category_id` = `post_category_id`;";
        if ($this->performQuery($query)) {
            return parent::fetchAll();
        } else {
            return NULL;
        }
    }
    

    public function fetchById($id) {
        $id = $this->run_mysql_real_escape_string($id);
        $query = "SELECT `post_id`, `category`.`category_title`, `post_title`,"
                . " `post_author`, `post_date`, `post_image`, `post_content`,"
                . " `post_tags`,`post_comment_count`, `post_views_count`,"
                . " `post_status` "
                . "FROM (SELECT `post_id`, `post_category_id`, `post_title`,"
                . " `post_author`, `post_date`, `post_image`, `post_content`,"
                . " `post_tags`, `post_comment_count`, `post_views_count`,"
                . " `post_status` FROM `posts` WHERE `post_id` = '$id') AS `posts` "
                . "LEFT JOIN  `category` ON `category_id` = `post_category_id`;";
        if ($this->performQuery($query)) {
            return parent::fetchAll()[0];
        } else {
            return NULL;
        }
    }
    
    public function fetchByCategory($id) {
        $id = $this->run_mysql_real_escape_string($id);
        $query = "SELECT `post_id`, `post_category_id`, `post_title`,"
                . " `post_author`, `post_date`, `post_image`, `post_content`,"
                . " `post_tags`, `post_comment_count`, `post_views_count`,"
                . " `post_status` FROM `posts` WHERE `post_category_id` = '$id'";
        if ($this->performQuery($query)) {
            return parent::fetchAll();
        } else {
            return NULL;
        }
    }

//end of fetchAll()

    public function searchAll($search) {
        $query = "SELECT `post_id`, `post_category_id`, `post_title`,"
                . " `post_author`, `post_date`, `post_image`, `post_content`,"
                . " `post_tags`, `post_comment_count`, `post_views_count`,"
                . " `post_status` FROM `posts` WHERE `post_tags` LIKE '%$search%'";
        if ($this->performQuery($query)) {
            return parent::fetchAll();
        } else {
            return NULL;
        }
    }

//end of searchAll()

    public function createPost() {
        $date = date('Y-m-d');
        $query = "INSERT INTO `posts`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_views_count`, `post_status`) "
                . " VALUES ('$this->category','$this->title','$this->author','$date','$this->image_name','$this->content','$this->tags','0','0','$this->status');";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        } else {
            if (!empty($this->image_name)) {
                move_uploaded_file($this->image_content, DIR . $this->image_name);
            }
        }
    }

    public function updatePost($id) {

        $id = $this->run_mysql_real_escape_string($id);
        $date = date('Y-m-d');
        $query = "UPDATE `posts` SET `post_category_id`='$this->category',`post_title`='$this->title',`post_author`='$this->author',`post_content`='$this->content',`post_tags`='$this->tags',`post_status`='$this->status' ";
        if (!empty($this->image_name)) {
            $query .= ",`post_image`='$this->image_name' ";
        }
        $query .= "  WHERE `post_id` = '$id';";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        } else {
            if (!empty($this->image_name)) {
                move_uploaded_file($this->image_content, FILE_DIR . $this->image_name);
            }
        }
    }

    public function deletePost($id) {
        $id = $this->run_mysql_real_escape_string($id);
        $query = "DELETE FROM `posts` WHERE `post_id` = '$id'";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        }
    }

}

//end of class