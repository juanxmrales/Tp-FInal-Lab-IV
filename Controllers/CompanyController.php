<?php
    namespace Controllers;

use DAO\CareerDAO;
use DAO\CompanyDAO as CompanyDAO;
use DAO\JobOfferDAO;
use Models\Company as Company;
use DAO\JobPositionDAO;
use DAO\UserType;

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

                if($_SESSION['type'] == UserType::Admin){

                    require_once(VIEWS_PATH."company-add.php");
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

        public function ShowModifyView($id)
        {
            
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    $companyList = $this->companyDAO->GetAll();
                    require_once(VIEWS_PATH."company-modify.php");
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

                    $companyList = $this->companyDAO->GetAll();

                    if(isset($_GET['filter']) && $_GET['filter'] != ""){

                        $companyList = array_filter($companyList, function($var){return $var->getName() == $_GET['filter'];});
                    }

                    require_once(VIEWS_PATH."company-list.php");
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

        public function ShowCompanyProfile($id)
        {

            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    $jobPositionDAO = new JobPositionDAO();
                    $careerDAO = new CareerDAO();
                    $jobOfferDAO = new JobOfferDAO();

                    $jobOfferList = $jobOfferDAO->GetAll();
                    $companyList = $this->companyDAO->GetAll();

                    require_once(VIEWS_PATH."company-profile.php");
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

        public function ShowListViewStudent()
        {
            
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    $this->ShowListView();
                }
                elseif($_SESSION['type'] == UserType::Student){

                    $companyList = $this->companyDAO->GetAll();

                    if(isset($_GET['filter']) && $_GET['filter'] != ""){

                        $companyList = array_filter($companyList, function($var){return $var->getName() == $_GET['filter'];});
                    }

                    require_once(VIEWS_PATH."company-list-student.php");  
                } 
                elseif($_SESSION['type'] == UserType::Company){

                    require_once(VIEWS_PATH."denied-access.php");
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
            
        }

        public function ShowCompanyProfileStudent($id)
        {
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Student){

                    $jobPositionDAO = new JobPositionDAO();
                    $careerDAO = new CareerDAO();
                    $jobOfferDAO = new JobOfferDAO();

                    $jobOfferList = $jobOfferDAO->GetAll();
                    $company = $this->companyDAO->SearchCompanyById($id);

                    require_once(VIEWS_PATH."company-profile-student.php");
                }
                elseif($_SESSION['type'] == UserType::Admin){

                    $jobPositionDAO = new JobPositionDAO();
                    $careerDAO = new CareerDAO();
                    $jobOfferDAO = new JobOfferDAO();

                    $jobOfferList = $jobOfferDAO->GetAll();
                    $companyList = $this->companyDAO->GetAll();

                    require_once(VIEWS_PATH."company-profile.php"); 
                } 
                elseif($_SESSION['type'] == UserType::Company){

                    require_once(VIEWS_PATH."denied-access.php");
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
            
        }

        public function Add($name, $street, $nacionality, $description)
        {
            
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

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

                    if($this->companyDAO->SearchCompany($name)==null)
                    {

                        $this->companyDAO->Delete($id);

                        $this->ShowListView();
                    }
                    else
                    {
                        $this->ShowAddView("El nombre de empresa ingresado ya existe");
                    }
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

        public function Modify($id,$name,$street,$nacionality,$description)
        {
            
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    if($this->companyDAO->SearchCompany($name)==null)
                    {

                        $this->companyDAO->Modify(new Company($id,$name, $street, $nacionality, $description));

                        $this->ShowCompanyProfile($id);
                    }
                    else
                    {
                        $this->ShowAddView("El nombre de empresa ingresado ya existe");
                    }
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