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

			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else{

		            $companyDAO = new CompanyDAO();
					$companyList = $companyDAO->GetAll();
					$jobPositionDAO = new JobPositionDAO();
					$jobPositionList = $jobPositionDAO->getAll();

					require_once(VIEWS_PATH."jobOffer-add.php");
                }         
            }
            else{
                require_once(VIEWS_PATH."login.php");
            } 
	
		}

		public function ShowListView($message = ""){
	
			if(isset($_SESSION['type'])){

                 $companyDAO  = new CompanyDAO();
				$careerDAO = new CareerDAO();
				$jobPositionDAO = new JobPositionDAO();


				$jobOfferList = $this->jobOfferDAO->getAll();
				require_once(VIEWS_PATH."jobOffer-list.php");        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }

        }
			

		public function ShowListViewAdmin(){
			
			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else{

		            $companyDAO  = new CompanyDAO();
					$careerDAO = new CareerDAO();
					$jobPositionDAO = new JobPositionDAO();


					$jobOfferList = $this->jobOfferDAO->getAll();
					require_once(VIEWS_PATH."jobOffer-list-admin.php");
                }         
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }

		}

		public function ShowUserJobs()
		{

			if(isset($_SESSION['type'])){

                $jobPositionDAO = new JobPositionDAO;
				$careerDAO = new CareerDAO();
				$companyDAO  = new CompanyDAO();
				$jobOfferList = $this->jobOfferDAO->getAll();

				require_once(VIEWS_PATH."user-postulations.php");
        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }

		}
		
		public function ShowPostulates($id)
		{
			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else{

		            $studentsDAO = new StudentDAO();
					$userDAO = new UserDAO();
					$jobOffer = (new JobOfferDAO)->getById($id);
					$postulates = $jobOffer->getUsers();
					require_once(VIEWS_PATH."jobOffer-postulates.php");
                }         
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
			
		}

		public function Add($idCompany,$idJobPosition,$description){


			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else{

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
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }	
		}

		
		public function ShowConfirmView($idJob,$message = ""){

			
			if(isset($_SESSION['type'])){

              $job = $this->jobOfferDAO->GetById($idJob);

				require_once(VIEWS_PATH."jobOffer-postulate-confirm.php");        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
			
		}

		public function ApplyJobOffer($idJob){

			if(isset($_SESSION['type'])){

              	$userXJob = new UserXJobOffer($_SESSION['idUser'],$idJob);
				$userXJobDAO = new UserXJobOfferDAO();

				$message = $userXJobDAO->Add($userXJob);	

				$this->ShowListView($message);   
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
			
		}

		public function ShowModifyView($id)
		{
			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else{

		            $companyDAO = new CompanyDAO();
					$companyList = $companyDAO->GetAll();
					$jobPositionDAO = new JobPositionDAO();
					$jobPositionList = $jobPositionDAO->getAll();
					$job = $this->jobOfferDAO->GetById($id);

					require_once(VIEWS_PATH."jobOffer-modify.php");
                }         
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
		}

		public function Modify($id,$idCompany,$idJobPosition,$fecha,$description)
		{	
			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);
                }
                else{

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
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
			
		}

		public function Delete($id)
		{

			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == 0){

                    
                }
                else{

		            $this->jobOfferDAO->Delete($id);
					$this->ShowListViewAdmin();
                }         
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
			
		}
		
	}

 ?>