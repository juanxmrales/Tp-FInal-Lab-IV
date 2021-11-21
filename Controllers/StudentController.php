<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use DAO\UserDAO;
    use Models\Student as Student;
    use DAO\UserType as UserType;

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

            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    $userDAO = new UserDAO();

                    $userList = $userDAO->GetAll();
                    $studentList = $this->studentDAO->GetAll();

                    require_once(VIEWS_PATH."buscar-alumno.php");
                }
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                } 
                elseif($_SESSION['type'] == UserType::Company){

                    require_once(VIEWS_PATH."denied-access.php");
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
        }

        //Muestra el perfil de un alumno
        public function ShowStudentProfile($email)
        {
            if(isset($_SESSION['type']))
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