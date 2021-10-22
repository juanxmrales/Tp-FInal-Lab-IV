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

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."user-add.php");
        }

        public function ShowListView()
        {
            $userList = $this->userDAO->GetAll();

            require_once(VIEWS_PATH."user-list.php");
        }

        public function Add($email, $password)
        {
            $user = new User($email,$password, 0);

            $this->userDAO->Add($user);

            $this->ShowAddView();
        }

        public function LogOut()
        {    
            session_start();

            session_destroy();

            header("location: " . FRONT_ROOT . "Home/Index");
        }
    }
?>