<?php
require_once('MySqlDao.php');
class DaoFactory { 
    private static $daoFactory;
  
    private function __construct() { 
    } 

    static function get() { 
        if(self::$daoFactory === null) { 
            self::$daoFactory = new DaoFactory();
        }
        return self::$daoFactory; 
    } 

    function dao() { 
        return new MySqlDao();
    }
  } 
?>