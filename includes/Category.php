<?php

/**
 * @author: Omar Tuffaha <omar_tuffaha@hotmail.com>
 * @description: This is a class that will all movements on Posts 
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @Class: Category
 *
 */
include_once 'Database.php';

class Category extends Database {

    public function fetchAll() {
        $query = "SELECT `category_id`, `category_title` FROM `category`";
        if ($this->performQuery($query)) {
            return parent::fetchAll();
        } else {
            return NULL;
        }
    }
    
    public function fetchByID($id) {
        $id = $this->run_mysql_real_escape_string($id);
        $query = "SELECT `category_id`, `category_title` FROM `category` WHERE `category_id` = '{$id}'";
        if ($this->performQuery($query)) {
            return parent::fetchAll()[0];
        } else {
            return NULL;
        }
    }

    public function insertCategory($category) {
        $category = $this->run_mysql_real_escape_string($category);
        $query = "INSERT INTO `category`(`category_title`) VALUES ('{$category}');";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        }
    }

    public function deleteByID($id) {
        $id = $this->run_mysql_real_escape_string($id);
        $query = "DELETE FROM `category` WHERE category_id = '$id';";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        }
    }
    
    public function updateCategory($id,$newCategory){
        $id = $this->run_mysql_real_escape_string($id);   
        $newCategory = $this->run_mysql_real_escape_string($newCategory);  
        $query = "UPDATE `category` SET `category_title`='{$newCategory}' WHERE `category_id` = '{$id}';";
        if (!$this->performQuery($query)) {
            die($this->getMysqliError());
        }
    }

}
