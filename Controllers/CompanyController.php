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

        public function ShowListView()
        {
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."company-list.php");
        }

        public function Add($id, $name, $street, $nacionality, $description)
        {
            $company = new Company($id, $name, $street, $nacionality, $description);

            $this->companyDAO->Add($company);

            $this->ShowAddView();
        }

        public function LogOut()
        {    
            session_start();

            session_destroy();

            header("location: " . FRONT_ROOT . "Home/Index");
        }
    }
?>