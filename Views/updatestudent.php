<?php
use stud\Student;
use stud\StudentDB;

require_once '../../studentPDO/Database/database.php';
require_once '../../studentPDO/Model/Student.php';
require_once '../../studentPDO/Model/StudentDB.php';

if(isset($_POST['upt'])){
    $id = $_POST['sid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $program = $_POST['program'];

    $student = new Student($name,$email,$program);
    $count = StudentDB::updateStudent($id,$student);
    if($count){
        header("Location: liststudents.php");

    }else {
        echo "problem updating";
    }
}

?>

<h1>Update student</h1>
<form action="updatestudent.php" method="post">
    <input type="hidden" value="<?= $su->id; ?>" name="sid">
    name:<input type="text" name="name"  value="<?= $su->name; ?>"/><br />
    email:<input type="text" name="email" value="<?= $su->email; ?>" /><br />
    program:<input type="text" name="program" value="<?= $su->program; ?>" /><br />
    <input type="submit" name="upt" value="Update Student">
</form>
