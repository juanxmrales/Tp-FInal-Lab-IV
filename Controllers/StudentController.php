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

        public function ShowStudentProfile($email)
        {
            $studentList = $this->studentDAO->GetAll();

            require_once(VIEWS_PATH."student-profile.php");
        }
    }
?>