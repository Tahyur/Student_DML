<?php

use stud\Student;
use stud\StudentDB;

require_once '../../Student/Database/database.php';
require_once '../../Student/Model/Student.php';
require_once '../../Student/Controller/StudentDB.php';

$id = $_POST['id'];
$val = StudentDB::getStudentDetails($id);
$name = $val->name;
$email = $val->email;
$program = $val->program;


if (isset($_POST['upt'])) {
    $id = $_POST['sid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $program = $_POST['program'];

    $student = new Student($name, $email, $program);
    $count = StudentDB::updateStudent($id, $student);
    if ($count) {
        header("Location: liststudents.php");

    } else {
        echo "problem updating";
    }
}
?>

<h1>Update student</h1>
<form action="updatestudent.php" method="post">
    <input type="hidden" value="<?= $student->id; ?>" name="sid">
    name:<input type="text" name="name" value="<?= $name; ?>"/><br/>
    email:<input type="text" name="email" value="<?= $email; ?>"/><br/>
    program:<input type="text" name="program" value="<?= $program; ?>"/><br/>
    <input type="submit" name="upt" value="Update Student">
</form>
