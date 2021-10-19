<?php 

	namespace Controllers;

	use DAO\CareerDAO;
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

			$careerDAO = new CareerDAO();
			$careerList = $careerDAO->GetAll();

			require_once(VIEWS_PATH."jobPosition-add.php");
		}

		public function ShowListView(){
			$companyDAO  = new CompanyDAO();
			$careerDAO = new CareerDAO();

			$jobPositionList = $this->jobPositionDAO->getAll();
			require_once(VIEWS_PATH."jobPosition-list.php");
		}

		public function Add($name,$companyId,$description,$career){

			$id = $this->jobPositionDAO->CountRecords() + 1;
			$jobPosition = new JobPosition($id,$name,$companyId,$description,true,$career);
			$this->jobPositionDAO->add($jobPosition);
			$this->ShowListView();
		}

		public function ApplyJobPosition($idJob){
			$email = $_SESSION['email'];

			$this->jobPositionDAO->applyById($idJob, $email);

			$this->ShowListView();
		}
	}

 ?>