<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;
    use DAO\UserType as UserType;

    class UserController
    {
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function ShowAddView($message = "") // REGISTRO COMUN
        {
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    require_once(VIEWS_PATH."user-add-admin.php");
                }
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                } 
                elseif($_SESSION['type'] == UserType::Company){

                    require_once(VIEWS_PATH."denied-access.php");
                }        
            }
            else{
                require_once(VIEWS_PATH."user-add.php");
            }
        }

        public function ShowAddViewAdmin($message = "") // AGREGADO DE USUARIO DE ADMIN
        {

            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    require_once(VIEWS_PATH."user-add-admin.php");
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

        public function ShowListView()
        {
            
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

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



        public function Add($email, $password)
        {

            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    $user = new User(0,$email,$password, 0);

                    $this->userDAO->Add($user);

                    $this->ShowAddView();
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

        public function Delete($id)
        {

            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    $this->userDAO->Delete($id);

                    $this->ShowListView();
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
    }
?>