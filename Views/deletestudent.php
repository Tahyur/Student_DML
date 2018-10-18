<?php
use stud\StudentDB;

require_once '../../Student/Database/database.php';
require_once '../../Student/Controller/StudentDB.php';


$id = $_POST['id'];
$count = StudentDB::deleteStudent($id);
if($count){
    header("Location: liststudents.php");

}else {
    echo "problem deleting";
}


