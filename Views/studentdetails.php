<?php
use stud\StudentDB;

require_once '../../studentPDO/Database/database.php';
require_once '../../studentPDO/Model/Student.php';
require_once '../../studentPDO/Model/StudentDB.php';

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
