<?php
use stud\StudentDB;

require_once '../../studentPDO/Database/database.php';
require_once '../../studentPDO/Model/StudentDB.php';


$id = $_POST['id'];
$count = StudentDB::deleteStudent($id);
if($count){
    header("Location: liststudents.php");

}else {
    echo "problem deleting";
}


