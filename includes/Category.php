<?php
/**
 * @author: Omar Tuffaha <omar_tuffaha@hotmail.com>
 * @description: This is a class that will all movements on Posts 
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @Class: Category
 *
 */
include_once 'Database.php';

class Category extends Database{
    
    public function fetchAll() {
        $query = "SELECT `category_id`, `category_title` FROM `category`";
        if($this->performQuery($query)){
            return parent::fetchAll();
        }else{
            return NULL;
        }
        
    }
}
