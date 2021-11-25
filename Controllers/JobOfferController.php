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
	use DAO\UserType as UserType;
	use Controllers\MailController as MailController;

class JobOfferController
	{
		private $jobOfferDAO;

		public function __construct(){

			$this->jobOfferDAO = new JobOfferDAO();
		}

		public function ShowAddView(){

			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin || $_SESSION['type'] == UserType::Company){

                    $companyDAO = new CompanyDAO();
					$companyList = $companyDAO->GetAll();
					$jobPositionDAO = new JobPositionDAO();
					$jobPositionList = $jobPositionDAO->getAll();

					require_once(VIEWS_PATH."jobOffer-add.php");
                }
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                } 
     
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
	
		}

		public function ShowListView($message = ""){
			
			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    $this->ShowListViewAdmin();
                }
                elseif($_SESSION['type'] == UserType::Student){

                    $companyDAO  = new CompanyDAO();
					$careerDAO = new CareerDAO();
					$jobPositionDAO = new JobPositionDAO();


					$jobOfferList = $this->jobOfferDAO->getAll();

					if(isset($_GET['position']) && $_GET['position'] != ""){

						$jobOfferList = array_filter($jobOfferList, function($var){return $var->getJobPosition() == $_GET['position'];});
					}

					if(isset($_GET['career']) && $_GET['career'] != ""){

						$jobOfferList = array_filter($jobOfferList, function($var){return $var->getCareer() == $_GET['career'];});
					}

					require_once(VIEWS_PATH."jobOffer-list.php");  
                } 
                elseif($_SESSION['type'] == UserType::Company){

                    require_once(VIEWS_PATH."denied-access.php");
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }

        }
		

		public function ShowListViewAdmin(){
			
			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    $companyDAO  = new CompanyDAO();
					$careerDAO = new CareerDAO();
					$jobPositionDAO = new JobPositionDAO();


					$jobOfferList = $this->jobOfferDAO->getAll();

					if(isset($_GET['position']) && $_GET['position'] != ""){

						$jobOfferList = array_filter($jobOfferList, function($var){return $var->getJobPosition() == $_GET['position'];});
					}

					if(isset($_GET['career']) && $_GET['career'] != ""){

						$jobOfferList = array_filter($jobOfferList, function($var){return $var->getCareer() == $_GET['career'];});
					}	
					
					require_once(VIEWS_PATH."jobOffer-list-admin.php");
                }
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                } 
                elseif($_SESSION['type'] == UserType::Company){

                    require_once(VIEWS_PATH."denied-access.php");
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }

		}

        public function ShowListViewCompany(){

                    $companyDAO  = new CompanyDAO();
                    $careerDAO = new CareerDAO();
                    $jobPositionDAO = new JobPositionDAO();

                    $jobOfferList = $this->jobOfferDAO->getAll();

                    $jobOfferList = array_filter($jobOfferList, function($var){return $var->getIdCompany() == $_SESSION['idComp'];});

                    if(isset($_GET['position']) && $_GET['position'] != ""){

                        $jobOfferList = array_filter($jobOfferList, function($var){return $var->getJobPosition() == $_GET['position'];});
                    }

                    if(isset($_GET['career']) && $_GET['career'] != ""){

                        $jobOfferList = array_filter($jobOfferList, function($var){return $var->getCareer() == $_GET['career'];});
                    }   
                    
                    require_once(VIEWS_PATH."jobOffer-list-company.php");
        }



		public function ShowUserJobs()
		{
			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    require_once(VIEWS_PATH."denied-access.php");
                }
                elseif($_SESSION['type'] == UserType::Student){

                    $jobPositionDAO = new JobPositionDAO;
					$careerDAO = new CareerDAO();
					$companyDAO  = new CompanyDAO();
					$jobOfferList = $this->jobOfferDAO->getAll();

					require_once(VIEWS_PATH."user-postulations.php");   
                } 
                elseif($_SESSION['type'] == UserType::Company){

                    require_once(VIEWS_PATH."denied-access.php");
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }

		}
		
		public function ShowPostulates($id)
		{
			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    $studentsDAO = new StudentDAO();
					$userDAO = new UserDAO();
                    $userXjobOfferDAO = new UserXJobOfferDAO();
                    $userXjobOfferList = $userXjobOfferDAO->GetAll();
					$jobOffer = (new JobOfferDAO)->getById($id);
					$postulates = $jobOffer->getUsers();
					require_once(VIEWS_PATH."jobOffer-postulates.php");
                }
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                } 
                elseif($_SESSION['type'] == UserType::Company){

                   $studentsDAO = new StudentDAO();
                    $userDAO = new UserDAO();
                    $userXjobOfferDAO = new UserXJobOfferDAO();
                    $userXjobOfferList = $userXjobOfferDAO->GetAll();
                    $jobOffer = (new JobOfferDAO)->getById($id);
                    $postulates = $jobOffer->getUsers();
                    require_once(VIEWS_PATH."jobOffer-postulates-company.php");  
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
			
		}

		public function ShowPostulatesPdf($id)
		{
			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin || $_SESSION['type'] == UserType::Company){

                    $studentsDAO = new StudentDAO();
					$userDAO = new UserDAO();
					$jobOffer = (new JobOfferDAO)->getById($id);
					$postulates = $jobOffer->getUsers();
					$list = array();

					foreach($postulates as $userId){    
	                       
                       $user = $userDAO->GetById($userId);     
                       $student = $studentsDAO->SearchStudentByEmail($user->getEmail());
                       array_push($list, $student);
	                }

					require_once(VIEWS_PATH."jobOffer-postulates-pdf.php");
                }
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
			
		}

		public function ShowDeclineForm($idJob, $idUser){

			require_once(VIEWS_PATH."jobOffer-decline-postulate.php");
		}


		public function DeclinePostulate($idJob, $idUser, $info){

			$userDAO = new UserDAO();

        	$user = $userDAO->GetById($idUser);

			MailController::SendDeclineInfo($user->getEmail(), $info);

			$userXJobDAO = new userXJobOfferDAO();

			$userXJobDAO->Delete($idUser, $idJob);

			$this->ShowListViewAdmin();

		}

		public function Add($idCompany,$idJobPosition,$description){

			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin || $_SESSION['type'] == UserType::Company){

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
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
		}

		
		public function ShowConfirmView($idJob,$message = ""){

			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    require_once(VIEWS_PATH."denied-access.php");
                }
                elseif($_SESSION['type'] == UserType::Student){

                    $job = $this->jobOfferDAO->GetById($idJob);

					require_once(VIEWS_PATH."jobOffer-postulate-confirm.php");   
                } 
                elseif($_SESSION['type'] == UserType::Company){

                    require_once(VIEWS_PATH."denied-access.php");
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
			
		}

		public function ApplyJobOffer($cv){

			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin){

                    require_once(VIEWS_PATH."denied-access.php");
                }
                elseif($_SESSION['type'] == UserType::Student){

                    $directorio = "Archivos/cv/";
                    $archivo = $directorio . basename($cv['name']);
                    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

                    if($tipoArchivo == "pdf")
                    {
                        if(!file_exists($archivo)&&move_uploaded_file($cv['tmp_name'],$archivo))
                        {
                            $userXJob = new UserXJobOffer($_SESSION['idUser'],$_SESSION['jobIdCv'],$archivo);
                            $userXJobDAO = new UserXJobOfferDAO();

                            $message = $userXJobDAO->Add($userXJob);	

                            $this->ShowListView($message);
                        }
                    }
                    else
                    {
                        $this->ShowListView();
                    }
                } 
                elseif($_SESSION['type'] == UserType::Company){

                    require_once(VIEWS_PATH."denied-access.php");
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
			
		}

		public function ShowModifyView($id)
		{
			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin || $_SESSION['type'] == UserType::Company){

                    $companyDAO = new CompanyDAO();
					$companyList = $companyDAO->GetAll();
					$jobPositionDAO = new JobPositionDAO();
					$jobPositionList = $jobPositionDAO->getAll();
					$job = $this->jobOfferDAO->GetById($id);

					require_once(VIEWS_PATH."jobOffer-modify.php");
                }
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
		}

		public function Modify($id,$idCompany,$idJobPosition,$fecha,$description)
		{	
			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin || $_SESSION['type'] == UserType::Company){

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

                    if ($_SESSION['type'] == UserType::Admin) {
                        $this->ShowListViewAdmin();
                    }else{
                        $this->ShowListViewCompany();
                    }

					
                }
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                }

            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
			
		}

		public function Delete($id)
		{
			if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin || $_SESSION['type'] == UserType::Company){

                	$jobOffer = $this->jobOfferDAO->GetById($id);
                	$postulates = $jobOffer->getUsers();

                	$userDAO = new UserDAO();

                	foreach($postulates as $userId){

                		$user = $userDAO->GetById($userId);
                		MailController::SendGreatings($user->getEmail());
                	}

                    $this->jobOfferDAO->Delete($id);

                    
					if ($_SESSION['type'] == UserType::Admin) {
                        $this->ShowListViewAdmin();
                    }else{
                        $this->ShowListViewCompany();
                    }
                }
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
			
		}

        public function ShowAddImageView($idJob)
        {
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin || $_SESSION['type'] == UserType::Company)
                {
                    require_once(VIEWS_PATH."choose-image.php");
                }
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
        }

        public function AddImage($image)
        {
            if(isset($_SESSION['type'])){

                if($_SESSION['type'] == UserType::Admin || $_SESSION['type'] == UserType::Company)
                {
                    $directorio = "Archivos/images/";
                    $archivo = $directorio . basename($image['name']);
                    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

                    if($tipoArchivo == "png" || $tipoArchivo == "jpg" || $tipoArchivo == "jpeg")
                    {
                        if(!file_exists($archivo)&&move_uploaded_file($image['tmp_name'],$archivo))
                        {
                            $this->jobOfferDAO->AddImage($_SESSION['idJobImagen'],$archivo);	

                            $this->ShowListViewAdmin();
                        }
                    }
                    else
                    {
                        $this->ShowListViewAdmin();
                    }
                }
                elseif($_SESSION['type'] == UserType::Student){

                    header("location:../Student/ShowStudentProfile/" . $_SESSION["email"]);   
                }        
            }
            else{
                require_once(VIEWS_PATH."login.php");
            }
        }
		
	}

 ?>