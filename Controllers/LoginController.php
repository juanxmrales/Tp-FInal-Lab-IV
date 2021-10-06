<?php

    namespace Controllers;

    use DAO\UserDAO as UserDAO;

    class LoginController
    {
        public function Verify($email,$password)
        {
            $users = new UserDAO();
            
            if($users->exist($email,$password))
            {
                require_once(VIEWS_PATH."student-add.php");
            }
            else
            {
                require_once(VIEWS_PATH."login.php");
            }
        }
    }

?>

