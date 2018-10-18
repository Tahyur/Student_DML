<?php
use stud\StudentDB;

require_once '../../Student/Database/database.php';
require_once '../../Student/Model/Student.php';
require_once '../../Student/Controller/StudentDB.php';

$id = $_GET['id'];
$student = StudentDB::getStudentDetails($id);

?>
<html>
<head>

</head>
<body>
<?php
        echo "  Student name : $student->name<br>
                Student email : $student->email <br>
                Student program : $student->program
               ";
    ?>
</body>
</html>
