<?php
class Database_
{
    //private properties
    private static  $user = 'root';
    private static $pass = '';
    private static $dsn = "mysql:host=localhost;dbname=sample";
    private static $db;

    private function __construct() {}

    //get pdo connection
    public static function getDb(){
        if(!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$user, self::$pass);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $e->getMessage();
               include '../../studentPDO/Error/customerror.php';
               exit();
            }
        }
        return self::$db;
    }
}