<?php
/**
 * Created by PhpStorm.
 * User: tayor
 * Date: 2018-10-18
 * Time: 11:00 AM
 */
namespace stud;
class Student
{
    private $name,$email,$program;

    public function __construct($name=null,$email=null,$program=null)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setProgram($program);
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $program
     */
    public function setProgram($program)
    {
        $this->program = $program;
    }

    /**
     * @return mixed
     */
    public function getProgram()
    {
        return $this->program;
    }
}