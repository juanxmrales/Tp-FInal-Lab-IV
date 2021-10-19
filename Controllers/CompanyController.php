<?php
    namespace Controllers;

use DAO\CareerDAO;
use DAO\CompanyDAO as CompanyDAO;
use DAO\JobPositionDAO;
use Models\Company as Company;

    class CompanyController
    {
        private $companyDAO;

        public function __construct()
        {
            $this->companyDAO = new CompanyDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."company-add.php");
        }

        public function ShowModifyView($id)
        {
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."company-modify.php");
        }

        public function ShowListView()
        {
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."company-list.php");
        }

        public function ShowCompanyProfile($id)
        {
            $careerDAO = new CareerDAO();
            $jobPositionDAO = new JobPositionDAO();

            $jobPositionList = $jobPositionDAO->GetAll();
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."company-profile.php");
        }

        public function ShowListViewStudent()
        {
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."company-list-student.php");
        }

        public function ShowCompanyProfileStudent($id)
        {

            $careerDAO = new CareerDAO();
            $jobPositionDAO = new JobPositionDAO();

            $jobPositionList = $jobPositionDAO->GetAll();
            $company = $this->companyDAO->SearchCompanyById($id);

            require_once(VIEWS_PATH."company-profile-student.php");
        }

        public function Add($name, $street, $nacionality, $description)
        {
            if(isset($_POST))
            {
                if($this->companyDAO->SearchCompany($name)==null)
                {
                    $id = $this->companyDAO->CountRecords() + 1;

                    $company = new Company($id, $name, $street, $nacionality, $description, true);

                    $this->companyDAO->Add($company);

                    $this->ShowAddView();
                }
                else
                {
                    $this->ShowAddView();
                }
            }
        }

        public function Delete($id)
        {
            $this->companyDAO->Delete($id);

            $this->ShowListView();
        }

        public function Modify($id,$name,$street,$nacionality,$description)
        {
            if(isset($_POST))
            {
                $this->companyDAO->Modify($id,$name,$street,$nacionality,$description);

                $this->ShowCompanyProfile($id);
            }
        }

        public function LogOut()
        {    
            session_start();

            session_destroy();

            header("location: " . FRONT_ROOT . "Home/Index");
        }
    }
?>