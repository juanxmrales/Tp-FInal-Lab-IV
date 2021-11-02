<?php

    namespace Controllers;

    use DAO\StudentDAO;
    use DAO\UserDAO as UserDAO;
    use Models\User;

class LoginRegisterController
    {
        public function Login($email,$password)
        {
            if(isset($_POST))
            {
                $users = new UserDAO();
                $students = new StudentDAO();
            
                if($users->exist($email,$password))
                {
                    $user = $users->searchUser($email);

                    $_SESSION['email'] = $email;
                    $_SESSION['type'] = $user->getType();
                    $_SESSION['idUser'] = $user->getId();

                    if($students->SearchStudentByEmail($email)||$_SESSION['type']==1)
                    {

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
                    else
                    {
                        $message = "Usuario o contraseña inválida";
                        require_once(VIEWS_PATH."login.php");
                    }

                }
                else
                {
                    $message = "Usuario o contraseña inválida";
                    require_once(VIEWS_PATH."login.php");
                }
            }
        }

        public function Register($email,$password)
        {
            if(isset($_POST))
            {
                $users = new UserDAO();
                $students = new StudentDAO();
            
                if(!$users->searchUser($email))
                {
                    if($students->SearchStudentByEmail($email))
                    {
                        $users->Add(new User($email,$password,0));

                        $message = "Cuenta creada con exito, por favor inicie sesion";
                        require_once(VIEWS_PATH."login.php");
                    }
                    else
                    {
                        $message = "Email inexistente en el sistema";
                        require_once(VIEWS_PATH."login.php");
                    }
                }
                else
                    {
                        $message = "El email ingresado ya fue utilizado";
                        require_once(VIEWS_PATH."login.php");
                    }

                
            }
        }
  
    }

?>

