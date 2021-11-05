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
            $jobPositionDAO = new JobPositionDAO();
            $careerDAO = new CareerDAO();
            $jobOfferDAO = new JobOfferDAO();

            $jobOfferList = $jobOfferDAO->GetAll();
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
            $jobPositionDAO = new JobPositionDAO();
            $careerDAO = new CareerDAO();
            $jobOfferDAO = new JobOfferDAO();

            $jobOfferList = $jobOfferDAO->GetAll();
            $company = $this->companyDAO->SearchCompanyById($id);

            require_once(VIEWS_PATH."company-profile-student.php");
        }

        public function Add($name, $street, $nacionality, $description)
        {
            if($this->companyDAO->SearchCompany($name)==null)
            {

                $company = new Company(0,$name, $street, $nacionality, $description);

                $this->companyDAO->Add($company);

                $this->ShowAddView();
            }
            else
            {
                $this->ShowAddView();
            }
        }

        public function Delete($id)
        {
            $this->companyDAO->Delete($id);

            $this->ShowListView();
        }

        public function Modify($id,$name,$street,$nacionality,$description)
        {
            $this->companyDAO->Modify(new Company($id,$name, $street, $nacionality, $description));

            $this->ShowCompanyProfile($id);

        }
    }
?>