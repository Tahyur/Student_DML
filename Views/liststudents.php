<?php
use stud\StudentDB;

require_once '../../Student/Database/database.php';
require_once '../../Student/Model/Student.php';
require_once '../../Student/Controller/StudentDB.php';

$students = StudentDB::viewStudents();

?>

<h1>List of students</h1>
<ul>
    <?php foreach ($students as $s){
        echo "<li><a href='studentdetails.php?id=$s->id'>".$s->name."</a>".
             "<form action='deletestudent.php' method='post'>
            <input type='hidden' name='id' value='$s->id' />
            <input type='submit' name='delete' value='Delete'>
            </form> 
            <form action='updatestudent.php' method='post'>
            <input type='hidden' name='id' value='$s->id' />
            <input type='submit' name='update' value='Update'>
            </form>
            </li>";
    } ?>
</ul>

<a href="addStudent.php">Add student</a>