<?php 

	namespace Controllers;

	use DAO\StudentDAO;
	use DAO\CareerDAO;
	use DAO\JobOfferDAO as JobOfferDAO;
	use Models\JobOffer as JobOffer;
	use DAO\CompanyDAO as CompanyDAO;
	use DAO\JobPositionDAO;
	use DAO\UserXJobOfferDAO;
	use Models\Company as Company;
	use Models\UserXJobOffer;
	use DAO\UserDAO;

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

		public function ShowListView($message = ""){
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
			$jobPositionDAO = new JobPositionDAO;
			$careerDAO = new CareerDAO();
			$companyDAO  = new CompanyDAO();
			$jobOfferList = $this->jobOfferDAO->getAll();

			require_once(VIEWS_PATH."user-postulations.php");
		}
		
		public function ShowPostulates($id)
		{
			$studentsDAO = new StudentDAO();
			$userDAO = new UserDAO();
			$jobOffer = (new JobOfferDAO)->getById($id);
			$postulates = $jobOffer->getUsers();

			require_once(VIEWS_PATH."jobOffer-postulates.php");
		}

		public function Add($idCompany,$idJobPosition,$description){

			$date = getdate();
			$fecha = $date["year"] . "-" . $date["mon"] . "-" . $date["mday"];

			$companyDAO = new CompanyDAO();
			$jobPositionDAO = new JobPositionDAO();
			$careerDAO = new CareerDAO();

			$company = ($companyDAO->SearchCompanyById($idCompany))->getName();
			$job = $jobPositionDAO->SearchJobPositionById($idJobPosition);

			$jobPosition = $job->getDescription();
			$careerId = $job->getCareerId();

			$career = ($careerDAO->SearchCareerById($careerId))->getDescription();

			$jobOffer = new JobOffer(0,$idJobPosition,$jobPosition,$idCompany,$company,$career,$fecha,$description);

			$this->jobOfferDAO->add($jobOffer);
			$this->ShowAddView();
		}

		
		public function ShowConfirmView($idJob, $jobPosition, $company){

			require_once(VIEWS_PATH."jobOffer-postulate-confirm.php");
		}

		public function ApplyJobOffer($idJob){

			$userXJob = new UserXJobOffer($_SESSION['idUser'],$idJob);
			$userXJobDAO = new UserXJobOfferDAO();

			$message = $userXJobDAO->Add($userXJob);

			$this->ShowListView($message);
		}

		public function ShowModifyView($id)
		{
			$companyDAO = new CompanyDAO();
			$companyList = $companyDAO->GetAll();
			$jobPositionDAO = new JobPositionDAO();
			$jobPositionList = $jobPositionDAO->getAll();
			$job = $this->jobOfferDAO->GetById($id);

			require_once(VIEWS_PATH."jobOffer-modify.php");
		}

		public function Modify($id,$idCompany,$idJobPosition,$fecha,$description)
		{
			$companyDAO = new CompanyDAO();
			$jobPositionDAO = new JobPositionDAO();
			$careerDAO = new CareerDAO();

			$company = ($companyDAO->SearchCompanyById($idCompany))->getName();
			$job = $jobPositionDAO->SearchJobPositionById($idJobPosition);

			$jobPosition = $job->getDescription();
			$careerId = $job->getCareerId();

			$career = ($careerDAO->SearchCareerById($careerId))->getDescription();

			$jobOffer = new JobOffer($id,$idJobPosition,$jobPosition,$idCompany,$company,$career,$fecha,$description);

			$this->jobOfferDAO->Modify($jobOffer);

			$this->ShowListViewAdmin();
		}

		public function Delete($id)
		{
			$this->jobOfferDAO->Delete($id);

			$this->ShowListViewAdmin();
		}
		
	}

 ?>