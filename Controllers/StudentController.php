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

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowListView()
        {
            $studentList = $this->studentDAO->GetAll();

            require_once(VIEWS_PATH."student-list.php");
        }

        public function SearchStudent()
        {
            $userDAO = new UserDAO();

            $userList = $userDAO->GetAll();
            $studentList = $this->studentDAO->GetAll();

            require_once(VIEWS_PATH."buscar-alumno.php");
        }

        public function ShowStudentProfile()
        {
            $studentList = $this->studentDAO->GetAll();

            require_once(VIEWS_PATH."student-profile.php");
        }
    }
?>