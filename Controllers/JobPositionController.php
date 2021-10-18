<?php 

	namespace Controllers;

	use DAO\JobPositionDAO as JobPositionDAO;
	use Models\JobPosition as JobPosition;
	use DAO\CompanyDAO as CompanyDAO;
	use Models\Company as Company;

	class JobPositionController
	{
		private $jobPositionDAO;

		public function __construct(){

			$this->jobPositionDAO = new JobPositionDAO();
		}

		public function ShowAddView(){

			$companyDAO = new CompanyDAO();
			$companyList = $companyDAO->GetAll();
			require_once(VIEWS_PATH."jobPosition-add.php");
		}

		public function ShowListView(){

			$jobPositionList = $this->jobPositionDAO->getAll();
			require_once(VIEWS_PATH."jobPosition-list.php");
		}

		public function Add(){

			$jobPosition = new JobPosition($_POST['id'],$_POST['name'], $_POST['companyId'],$_POST['description'], "", $_POST['active']);
			$this->jobPositionDAO->add($jobPosition);
			$this->ShowListView();
		}

		public function ApplyJobPosition($idJob){

			$this->jobPositionDAO->applyById($idJob, "Lanzilota");
		}
	}

 ?>