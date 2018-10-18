<?php
/**
 * Created by PhpStorm.
 * User: tayor
 * Date: 2018-10-18
 * Time: 11:08 AM
 */

namespace stud;
require_once "../../studentPDO/Database/database.php";

class StudentDB
{
    public static function addStudent($student)
    {
        $db = \Database_::getDb();
        $sql = "INSERT INTO students (name, email, program)VALUES (:name, :email, :program)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':name', $student->getName(), \PDO::PARAM_STR);
        $pdostm->bindValue(':email', $student->getEmail(), \PDO::PARAM_STR);
        $pdostm->bindValue(':program', $student->getProgram(), \PDO::PARAM_STR);
        $count  = $pdostm->execute();
        return $count;
    }

    public static function viewStudents(){
        $db = \Database_::getDb();
        $sql = "SELECT * FROM students";
        $database_query = $db->prepare($sql);
        $database_query -> setFetchMode(\PDO::FETCH_OBJ);
        $database_query -> execute();
        $students = $database_query->fetchAll(\PDO::FETCH_OBJ);
        return $students;
    }

    public static function updateStudent($id,$student){
        $db = \Database_::getDb();
        $sql = "UPDATE students SET name = :name,email = :email, program = :program  WHERE id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
        $pdostm->bindValue(':name', $student->getName(), PDO::PARAM_STR);
        $pdostm->bindValue(':email', $student->getEmail(), PDO::PARAM_STR);
        $pdostm->bindValue(':program', $student->getProgram(), PDO::PARAM_STR);
        $count  = $pdostm->execute();
        return $count;
    }

    public static function deleteStudent($id){
        $db = \Database_::getDb();
        $query = "DELETE FROM students WHERE id = :id";
        $pdostm = $db->prepare($query);
        $pdostm->bindValue(':id', $id, \PDO::PARAM_INT);
        $count = $pdostm->execute();
        return $count;
    }

    public static function getStudentDetails($id){
        $db = \Database_::getDb();
        $sql = "SELECT * FROM students WHERE id =:id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':id', $id, \PDO::PARAM_INT);
        $pdostm -> setFetchMode(\PDO::FETCH_OBJ);
        $pdostm -> execute();
        $student = $pdostm->fetch(\PDO::FETCH_OBJ);
        return $student;
    }

    public static function getStudentPrograms(){
        $db = \Database_::getDb();
        $sql = "SELECT DISTINCT program FROM students";
        $pdostm = $db->prepare($sql);
        $pdostm -> execute();
        $programs = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $programs;
    }

    public static function getStudentByProgram($program){
        $db = \Database_::getDb();
        $sql = "SELECT name FROM students WHERE program =:program";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':program', $program);
        $pdostm -> execute();
        $student = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $student;
    }
}