<?php

    namespace Controllers;

    use DAO\UserDAO as UserDAO;

    class LoginController
    {
        public function Verify($email,$password)
        {
            if(isset($_POST))
            {
                $users = new UserDAO();
            
                if($users->exist($email,$password))
                {
                    $user = $users->searchUser($email);

                    $_SESSION['email'] = $email;
                    $_SESSION['type'] = $user->getType();

                    $_SESSION['logueado'] = 1;

                    require_once(VIEWS_PATH."student-add.php");
                }
                else
                {
                    $message = "Usario o contraseña inválida";
                    require_once(VIEWS_PATH."login.php");
                }
            }
        }
    }

?>

