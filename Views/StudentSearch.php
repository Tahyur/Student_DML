<?php

use stud\StudentDB;

$stud = array();

require_once '../../Student/Database/database.php';
require_once '../../Student/Model/Student.php';
require_once '../../Student/Controller/StudentDB.php';


function getPrograms()
{
    $studentPrograms = StudentDB::getStudentPrograms();
    foreach ($studentPrograms as $studentProgram) {
        echo "<option value='$studentProgram->program'> $studentProgram->program</option>";
    }
}

function getStudentName($program)
{
    $res = array();
    $students = StudentDB::getStudentByProgram($program);
    foreach ($students as $student) {
        array_push($res, $student);
    }
    return $res;
}

function displayStudentName()
{
    global $stud;
    foreach ($stud as $s => $value) {
        foreach ($value as $v) {
            echo "<li>$v->name</li>";
        }
    }
}

if (isset($_POST['search'])) {
    try {
        $program = $_POST['program'];
        array_push($stud, getStudentName($program));
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

?>
<html>
<head></head>
<body>
<form method="post">
    <h1> Program List </h1>
    <select name="program">
        <?php getPrograms(); ?>
    </select>
    <input type="submit" name="search" value="Get student program">
    <ol> <?php displayStudentName(); ?> </ol>
</form>
</body>
</html>
