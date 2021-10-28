<?php

    namespace Controllers;

    use DAO\StudentDAO;
    use DAO\UserDAO as UserDAO;

    class LoginController
    {
        public function Verify($email,$password)
        {
            if(isset($_POST))
            {
                $users = new UserDAO();
                $students = new StudentDAO();
            
                if($users->exist($email,$password))
                {
                    if($students->SearchStudentByEmail($email))
                    {
                        $user = $users->searchUser($email);

                        $_SESSION['email'] = $email;
                        $_SESSION['type'] = $user->getType();

                        $_SESSION['logueado'] = 1;

                        if($_SESSION['type'] == 0)
                        {
                            header("location:". FRONT_ROOT . "Student/ShowStudentProfile");
                        }
                        else if($_SESSION['type'] == 1)
                        {
                            header("location:". FRONT_ROOT . "Student/SearchStudent");
                        }
                    }
                }
                else
                {
                    $message = "Usuario o contraseña inválida";
                    require_once(VIEWS_PATH."login.php");
                }
            }
        }
    }

?>

