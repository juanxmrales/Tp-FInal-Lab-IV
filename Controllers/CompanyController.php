<?php
    namespace Controllers;

    use DAO\CompanyDAO as CompanyDAO;
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
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."company-profile.php");
        }

        public function Add($name, $street, $nacionality, $description, $active)
        {
            if(isset($_POST))
            {
                if($this->companyDAO->SearchCompany($name)==null)
                {
                    $id = $this->companyDAO->CountRecords() + 1;

                    $company = new Company($id, $name, $street, $nacionality, $description, $active);

                    $this->companyDAO->Add($company);

                    $this->ShowAddView();
                }
                else
                {
                    $this->ShowAddView();
                }
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