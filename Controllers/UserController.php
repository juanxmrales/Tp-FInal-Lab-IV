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

        public function ShowAddView($message = "")
        {
            require_once(VIEWS_PATH."user-add.php");
        }

        public function ShowAddViewAdmin($message = "")
        {
            require_once(VIEWS_PATH."user-add-admin.php");
        }

        public function ShowListView()
        {
            $userList = $this->userDAO->GetAll();

            require_once(VIEWS_PATH."user-list.php");
        }


        public function Add($email, $password)
        {
            $user = new User(0,$email,$password, 0);

            $this->userDAO->Add($user);

            $this->ShowAddView();
        }
    }
?>