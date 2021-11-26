<?php
    namespace Controllers;

use DAO\CareerDAO;
use DAO\CompanyDAO as CompanyDAO;
use DAO\JobOfferDAO;
use Models\Company as Company;
use DAO\JobPositionDAO;
use DAO\UserType;
Use Models\user as User;
use DAO\UserDAO;

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

                     $company = null;

                     foreach($companyList as $value)
                     {
                          if($value->getId() == $id)
                          {
                               $company = $value;
                          }
                     }
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

                    $company = $this->companyDAO->SearchCompanyById($id);

                    require_once(VIEWS_PATH."company-profile.php");
                }
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                } 
                elseif($_SESSION['type'] == UserType::Company){


                    $this->ShowCompanyProfileCompany();
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }

        }

         public function ShowCompanyProfileCompany()
        {

            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    $this->ShowCompanyProfile($_SESSION['idComp']);
                }
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                } 
                elseif($_SESSION['type'] == UserType::Company){

                    $jobPositionDAO = new JobPositionDAO();
                    $careerDAO = new CareerDAO();
                    $jobOfferDAO = new JobOfferDAO();

                    $jobOfferList = $jobOfferDAO->GetAll();
                    $companyList = $this->companyDAO->GetAll();

                    $company = $this->companyDAO->SearchCompanyById($_SESSION['idComp']);
                    
                    require_once(VIEWS_PATH."company-profile-company.php");
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

        public function Add($name, $street, $nacionality, $email, $password, $description)
        {
            
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    if($this->companyDAO->SearchCompany($name)==null)
                    {
                        
                        $user = new User(0,$email,password_hash($password,PASSWORD_DEFAULT), 2);
                        $userDAO = new UserDAO();

                        $userDAO->Add($user);

                        $usuario = $userDAO->searchUser($email);

                        $company = new Company(0,$name, $street, $nacionality, $description, $usuario->getId());
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

        public function Modify($name,$street,$nacionality,$description,$id, $idusuario)
        {
            
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                        $this->companyDAO->Modify(new Company($id,$name, $street, $nacionality, $description, $idusuario));

                        $this->ShowCompanyProfile($id);
                    
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