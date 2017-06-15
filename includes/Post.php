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
    }

    function setContent($content) {
        $this->content = $this->run_mysql_real_escape_string($content);
    }

    function setImage_name($image_name) {
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
        $query = "SELECT `post_id`, `post_category_id`, `post_title`,"
                . " `post_author`, `post_date`, `post_image`, `post_content`,"
                . " `post_tags`, `post_comment_count`, `post_views_count`,"
                . " `post_status` FROM `posts`";
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
                . "             VALUES ('$this->category','$this->title','$this->author','$date','$this->image_name','$this->content','$this->tags','0','0','$this->status');";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        } else {
            if (!empty($this->image_name)) {
                move_uploaded_file($this->image_content, DIR . $this->image_name);
            }
        }
    }

}

//end of class