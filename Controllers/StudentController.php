<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
use DAO\UserDAO;
use Models\Student as Student;

    class StudentController
    {
        private $studentDAO;

        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
        }

        //Muestra la lista de alumnos para admin
        public function SearchStudent()
        {
            if(isset($_SESSION['type']))
            {
                if($_SESSION['type'] == 0)
                {
                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else
                {
                    $userDAO = new UserDAO();

                    $userList = $userDAO->GetAll();
                    $studentList = $this->studentDAO->GetAll();

                    require_once(VIEWS_PATH."buscar-alumno.php");
                }
            }
            else
            {
                require_once(VIEWS_PATH."login.php");
            }
        }

        //Muestra el perfil de un alumno
        public function ShowStudentProfile($email)
        {
            if(isset($_SESSION['logueado']))
            {
                $studentList = $this->studentDAO->GetAll();

                require_once(VIEWS_PATH."student-profile.php");
            }
            else
            {
                require_once(VIEWS_PATH."login.php");
            }
        }
    }
?>