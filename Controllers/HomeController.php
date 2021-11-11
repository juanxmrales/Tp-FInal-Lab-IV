<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = "")
        {
            if(isset($_SESSION['logueado']))
            {
                if($_SESSION['type']==0)
                {
                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else
                {
                    header("location:../Student/SearchStudent");
                }
            }
            else
            {
                require_once(VIEWS_PATH."login.php");
            }
        }        
    }
?>