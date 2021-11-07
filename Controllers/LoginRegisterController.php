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

                    $student = $students->SearchStudentByEmail($email);

                    if($_SESSION['type']==0)
                    {
                        if($student!=null)
                        {
                            if($student->getActive())
                            {
                                $_SESSION['logueado'] = 1;

                                header("location:". FRONT_ROOT . "Student/ShowStudentProfile/" . $_SESSION["email"]);
                            }
                            else
                            {
                                $message = "Usted no tiene permisos para ingresar en el sistema. Verifique su estado con personal.";
                                require_once(VIEWS_PATH."login.php");
                            }
                        }
                        else
                        {
                            $message = "Usted no tiene permisos para ingresar en el sistema. Verifique su estado con personal.";
                            require_once(VIEWS_PATH."login.php");
                        }
                    }
                    else if($_SESSION['type']==1)
                    {
                        $_SESSION['logueado'] = 1;

                        header("location:". FRONT_ROOT . "Student/SearchStudent");
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
    
            $users = new UserDAO();
            $students = new StudentDAO();
        
            if(!$users->searchUser($email))
            {
                $student = $students->SearchStudentByEmail($email);

                if($student!=null)
                {
                    if($student->getActive())
                    {
                        $users->Add(new User(0,$email,password_hash($password, PASSWORD_DEFAULT),0));

                        $message = "Cuenta creada con exito, por favor inicie sesion";
                        require_once(VIEWS_PATH."login.php");
                    }
                    else
                    {
                        $message = "Usted no tiene permisos para ingresar en el sistema. Verifique su estado con personal.";
                        require_once(VIEWS_PATH."login.php");
                    }
                }
                else
                {
                    $message = "Email inexistente en el sistema";
                    require_once(VIEWS_PATH."user-add.php");
                }
            }
            else
                {
                    $message = "El email ingresado ya fue utilizado";
                    require_once(VIEWS_PATH."user-add.php");
                }
        }

        public function RegisterAdmin($email,$password,$type)
        {
    
            $users = new UserDAO();
            $students = new StudentDAO();
        
            if(!$users->searchUser($email))
            {
                
                if($type == 0){

                    $student = $students->SearchStudentByEmail($email);

                    if($student!=null)
                    {
                        if($student->getActive())
                        {
                            $users->Add(new User(0,$email,password_hash($password, PASSWORD_DEFAULT),0));

                            $message = "Cuenta estudiantil creada con exito";
                         }
                        else
                        {
                            $message = "El email ingresado se encuentra en estado inactivo";

                        }
                    }
                    else
                    {
                        $message = "Email inexistente en el sistema";
                    }
                }
                else{

                    $users->Add(new User(0,$email,password_hash($password, PASSWORD_DEFAULT),1));
                    $message = "Cuenta administrativa creada con exito";
                }
         
            }
            else
                {
                    $message = "El email ingresado ya fue utilizado";
                }

            require_once(VIEWS_PATH."user-add-admin.php");
        }
        

        public function LogOut()
        {    
            session_start();

            session_destroy();

            header("location: " . FRONT_ROOT . "Home/Index");
        }
  
    }

?>

