<?php 

	namespace Controllers;

	use DAO\CareerDAO;
	use DAO\JobOfferDAO as JobOfferDAO;
	use Models\JobOffer as JobOffer;
	use DAO\CompanyDAO as CompanyDAO;
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

			$careerDAO = new CareerDAO();
			$careerList = $careerDAO->GetAll();

			require_once(VIEWS_PATH."jobOffer-add.php");
		}

		public function ShowListView(){
			$companyDAO  = new CompanyDAO();
			$careerDAO = new CareerDAO();

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

		public function Add($name,$companyId,$description,$career){

			$jobOffer = new JobOffer($id,$name,$companyId,$description,true,$career);
			$this->jobOfferDAO->add($jobOffer);
			$this->ShowListView();
		}

		public function ApplyJobOffer($idJob){
			$email = $_SESSION['email'];

			$this->jobOfferDAO->applyById($idJob, $email);

			$this->ShowListView();
		}
	}

 ?>