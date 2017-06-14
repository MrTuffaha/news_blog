<?php

/**
 * @author: Omar Tuffaha <omar_tuffaha@hotmail.com>
 * @description: This is a class that will all movements on Posts 
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @Class: Post
 */

require_once 'Database.php';

class Post extends Database{
    
    
    public function fetchAll() {
        $query = "SELECT `post_id`, `post_category_id`, `post_title`,"
                . " `post_author`, `post_date`, `post_image`, `post_content`,"
                . " `post_tags`, `post_comment_count`, `post_views_count`,"
                . " `post_status` FROM `posts`";
        if($this->performQuery($query)){
            return parent::fetchAll();
        }else{
            return NULL;
        }
    }
}