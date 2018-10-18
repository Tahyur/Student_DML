<?php
use stud\Student;
use stud\StudentDB;

require_once '../../studentPDO/Database/database.php';
require_once '../../studentPDO/Model/Student.php';
require_once '../../studentPDO/Model/StudentDB.php';

if(isset($_POST['add'])){
    //get form values and assign to local variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $program = $_POST['program'];

    $student = new Student($name,$email,$program);

    if((StudentDB::addStudent($student)) > 0){
        echo "Student Added";
    } else
    {
        echo "Student not added";
    }
}
?>

<h1>Add student</h1>
<form action="addStudent.php" method="post">
    name:<input type="text" name="name" /><br />
    email:<input type="text" name="email" /><br />
    program:<input type="text" name="program" /><br />
    <input type="submit" name="add" value="Add Student">
</form>
