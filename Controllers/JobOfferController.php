<?php 

	namespace Controllers;

	use DAO\CareerDAO;
	use DAO\JobOfferDAO as JobOfferDAO;
	use Models\JobOffer as JobOffer;
	use DAO\CompanyDAO as CompanyDAO;
	use DAO\JobPositionDAO;
	use Models\Company as Company;

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

		public function ShowUserJobs()
		{
			$careerDAO = new CareerDAO();
			$companyDAO  = new CompanyDAO();
			$jobOfferList = $this->jobOfferDAO->getAll();

			require_once(VIEWS_PATH."user-postulation.php");
		}
		

		public function Add($idCompany,$idJobPosition,$description){

			$jobOffer = new JobOffer(0, $idJobPosition, $idCompany, "2000-07-08", $description, 1);
			$this->jobOfferDAO->add($jobOffer);
			$this->ShowListView();
		}

		/*
		public function ApplyJobOffer($idJob){
			$email = $_SESSION['email'];

			$this->jobOfferDAO->applyById($idJob, $email);

			$this->ShowListView();
		}
		*/
	}

 ?>