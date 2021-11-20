<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class UserController
    {
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function ShowAddView($message = "") // REGISTRO COMUN
        {
            if(isset($_SESSION['logueado'])&&$_SESSION['logueado']==1)
            {
                if($_SESSION['type']==0)
                {
                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else
                {
                    require_once(VIEWS_PATH."user-add-admin.php");
                }
            }
            else
            {
                require_once(VIEWS_PATH."user-add.php");
            }
        }

        public function ShowAddViewAdmin($message = "") // AGREGADO DE USUARIO DE ADMIN
        {
            if(isset($_SESSION['type']))
            {
                if($_SESSION['type'] == 0)
                {
                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else
                {
                    require_once(VIEWS_PATH."user-add-admin.php");
                }
            }
            else
            {
                require_once(VIEWS_PATH."login.php");
            }
        }

        public function ShowListView()
        {
            if(isset($_SESSION['type']))
            {
                if($_SESSION['type'] == 0)
                {
                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else
                {               
                    $userList = $this->userDAO->GetAll();

                    if(isset($_GET['filter'])){

                        if($_GET['filter'] == 0){

                            $userList = array_filter($userList, function($var){return $var->getType() == 0;});
                        }
                        elseif($_GET['filter'] == 1){
                            $userList = array_filter($userList, function($var){return $var->getType() == 1;});      
                        }
                        elseif($_GET['filter'] == 2){
                            $userList = array_filter($userList, function($var){return $var->getType() == 2;});
                        }

                    }

                    require_once(VIEWS_PATH."user-list.php");
                }
            }
            else
            {
                require_once(VIEWS_PATH."login.php");
            }
        }



        public function Add($email, $password)
        {

            if(isset($_SESSION['type']))
            {
                if($_SESSION['type'] == 0)
                {
                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else
                {               
                    $user = new User(0,$email,$password, 0);

                    $this->userDAO->Add($user);

                    $this->ShowAddView();
                }
            }
            else
            {
                require_once(VIEWS_PATH."login.php");
            }
        }

        public function Delete($id)
        {

            if(isset($_SESSION['type']))
            {
                if($_SESSION['type'] == 0)
                {
                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else
                {               

                    $this->userDAO->Delete($id);

                    $this->ShowListView();
                }
            }
            else
            {
                require_once(VIEWS_PATH."login.php");
            }
        }
    }
?>