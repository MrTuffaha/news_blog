<?php

include_once 'config.php';

/**
 * @ClassName : MySql Database Class
 * @Description : This Class is Used to perform actions in Mysql DB
 * @Version : 2.7v
 * @LastEdit : 14/Jun/2017
 * @Author : Omar Tuffaha <omar_tuffaha@hotmail.com>
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 */
class Database {

    private $conn;
    private $lastQuery;
    private $recordSet = array();

    //this is a contructer of the class datbase
    public function __construct() {

        //it start the connection with the database
        $this->openConnection();
    }

//end of construct
    //this function establishes a connection to database
    protected function openConnection() {

        //connect to database
        $this->conn = mysqli_connect(DBSERVER, DBUSER, DBPASS, DBNAME);

        //if connection did not establish the website will die (stop)
        if (!$this->conn) {
            die("Cannot Connect to Server: " . mysqli_connect_error());
        }//end of if statment

        if (!mysqli_set_charset($this->conn, "utf8")) {
            die("Error loading character set utf8: " . mysqli_connect_error() . "\n");
            exit();
        }
    }

//end of openConnection()
    //this function performs the query that was requested by other classes
    //it takes a String of the query as a paremeter
    protected function performQuery($query) {

        //perform query
        $this->lastQuery = mysqli_query($this->conn, $query);

        // if the query is performed it will return the result else it
        // will return false
        return $this->lastQuery ? $this->lastQuery : FALSE;
    }

//end of function performQuery($query)
    //this function performs multi insert querys that was requested by other classes
    //it takes a String of the insert querys as a paremeter
    protected function insertMultiQuery($querys) {

        //perform query
        $this->lastQuery = mysqli_multi_query($this->conn, $querys);

        // if the query is performed it will return the result else it
        // will return false
        return $this->lastQuery ? $this->lastQuery : FALSE;
    }

//end of performMultiQuery()
    //this function returns all of a list that was requested from a database
    protected function fetchAll() {

        $this->recordSet = NULL;
        //this loop goes over all the items that are requested
        while ($row = mysqli_fetch_assoc($this->lastQuery)) {
            $this->recordSet[] = $row;
        }//end of while loop
        //if the recordset is not empty the record set the result else it
        // will return false
        return !empty($this->recordSet) ? $this->recordSet : FALSE;
    }

    //end of function fetchAll
    //this function returns the last id used
    protected function lastInsertedId() {
        return mysqli_insert_id($this->conn);
    }

//end of lastInserted Id


    protected function run_mysql_real_escape_string($string) {
        $string = Database::encodeIllegalCharAndFilter($string);
        return mysqli_escape_string($this->conn, $string);
    }

     protected function encodeIllegalCharAndFilter($string) {

        $string = str_replace("'", "%21", $string);
        //$string = str_replace("-", "%22", $string);
        //$string = str_replace(".", "%23", $string);
        $string = str_replace("\"", "%24", $string);
        $string = str_replace("\\", "%25", $string);
        //$string = str_replace("/", "%26", $string);
        //$string = str_replace(" ", "%27", $string);
        return $string;
    }

    protected function decodeIllegalChar($string) {

        $string = str_replace("%21", "'", $string);
        //$string = str_replace("%22", "-", $string);
        //$string = str_replace("%23", ".", $string);
        $string = str_replace("%24", "\"", $string);
        $string = str_replace("%25","\\", $string);
        //$string = str_replace("%26","/", $string);
        //$string = str_replace("%27"," ", $string);
        return $string;
    }

    protected function getMysqliError() {
        return mysqli_error($this->conn);
    }

}

//end of class database
