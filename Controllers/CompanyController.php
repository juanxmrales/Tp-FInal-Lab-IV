<?php
    namespace Controllers;

use DAO\CareerDAO;
use DAO\CompanyDAO as CompanyDAO;
use DAO\JobOfferDAO;
use Models\Company as Company;
use DAO\JobPositionDAO;

    class CompanyController
    {
        private $companyDAO;

        public function __construct()
        {
            $this->companyDAO = new CompanyDAO();
        }

        public function ShowAddView($message = "")
        {
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else{

                    require_once(VIEWS_PATH."company-add.php");
                }         
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }   
        }

        public function ShowModifyView($id)
        {
        
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else{

                    $companyList = $this->companyDAO->GetAll();
                    require_once(VIEWS_PATH."company-modify.php");
                }         
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
            
        }

        public function ShowListView()
        {
            
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else{

                    $companyList = $this->companyDAO->GetAll();
                    require_once(VIEWS_PATH."company-list.php");                
                }         
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }

        }

        public function ShowCompanyProfile($id)
        {

            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else{

                    $jobPositionDAO = new JobPositionDAO();
                    $careerDAO = new CareerDAO();
                    $jobOfferDAO = new JobOfferDAO();

                    $jobOfferList = $jobOfferDAO->GetAll();
                    $companyList = $this->companyDAO->GetAll();

                    require_once(VIEWS_PATH."company-profile.php");
                }         
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }

        }

        public function ShowListViewStudent()
        {
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."company-list-student.php");
        }

        public function ShowCompanyProfileStudent($id)
        {
            $jobPositionDAO = new JobPositionDAO();
            $careerDAO = new CareerDAO();
            $jobOfferDAO = new JobOfferDAO();

            $jobOfferList = $jobOfferDAO->GetAll();
            $company = $this->companyDAO->SearchCompanyById($id);

            require_once(VIEWS_PATH."company-profile-student.php");
        }

        public function Add($name, $street, $nacionality, $description)
        {
            
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else{

                    if($this->companyDAO->SearchCompany($name)==null)
                    {

                        $company = new Company(0,$name, $street, $nacionality, $description);

                        $this->companyDAO->Add($company);

                        $this->ShowAddView("Registro exitoso");
                    }
                    else
                    {
                        $this->ShowAddView("El nombre de empresa ingresado ya existe");
                    }
                }         
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
        }

        public function Delete($id)
        {

            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else{

                    $this->companyDAO->Delete($id);

                    $this->ShowListView();
                }         
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }

        }

        public function Modify($id,$name,$street,$nacionality,$description)
        {
            
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else{

                    $this->companyDAO->Modify(new Company($id,$name, $street, $nacionality, $description));

                    $this->ShowCompanyProfile($id);
                }         
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }

        }
    }
?>