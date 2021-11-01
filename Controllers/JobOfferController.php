<?php 

	namespace Controllers;

	use DAO\CareerDAO;
	use DAO\JobOfferDAO as JobOfferDAO;
	use Models\JobOffer as JobOffer;
	use DAO\CompanyDAO as CompanyDAO;
	use DAO\JobPositionDAO;
use DAO\UserXJobOfferDAO;
use Models\Company as Company;
use Models\UserXJobOffer;

class JobOfferController
	{
		private $jobOfferDAO;

		public function __construct(){

			$this->jobOfferDAO = new JobOfferDAO();
		}

		public function ShowAddView(){

			$companyDAO = new CompanyDAO();
			$companyList = $companyDAO->GetAll();
			$jobPositionDAO = new JobPositionDAO();
			$jobPositionList = $jobPositionDAO->getAll();

			require_once(VIEWS_PATH."jobOffer-add.php");
		}

		public function ShowListView(){
			$companyDAO  = new CompanyDAO();
			$careerDAO = new CareerDAO();
			$jobPositionDAO = new JobPositionDAO();


			$jobOfferList = $this->jobOfferDAO->getAll();
			require_once(VIEWS_PATH."jobOffer-list.php");
		}

		public function ShowListViewAdmin(){
			$companyDAO  = new CompanyDAO();
			$careerDAO = new CareerDAO();
			$jobPositionDAO = new JobPositionDAO();


			$jobOfferList = $this->jobOfferDAO->getAll();
			require_once(VIEWS_PATH."jobOffer-list-admin.php");
		}

		public function ShowUserJobs()
		{
			$careerDAO = new CareerDAO();
			$companyDAO  = new CompanyDAO();
			$jobOfferList = $this->jobOfferDAO->getAll();

			require_once(VIEWS_PATH."user-postulations.php");
		}
		

		public function Add($idCompany,$idJobPosition,$description){

			$date = getdate();
			$fecha = $date["year"] . "-" . $date["mon"] . "-" . $date["mday"];
			$jobOffer = new JobOffer(0, $idJobPosition, $idCompany, $fecha, $description, 1);
			$this->jobOfferDAO->add($jobOffer);
			$this->ShowListView();
		}

		
		public function ApplyJobOffer($idJob){

			$email = $_SESSION['email'];

			$userXJob = new UserXJobOffer($email,$idJob);
			$userXJobDAO = new UserXJobOfferDAO();

			$userXJobDAO->Add($userXJob);

			$this->ShowListView();
		}
		
	}

 ?>