<?php 

	namespace DAO;

	use DAO\ApiDAO as ApiDAO;
	use Models\Career as Career;

	class CareerDAO{

		private $careerList = array();

		public function RetrieveData(){

			$jsonCareers = ApiDAO::retrieveCareers();

			foreach($jsonCareers as $career){

				$newCareer = new Career($career['careerId'],$career['description'],$career['active']);
				array_push($this->careerList, $newCareer);	
			}
		}

		public function GetAll(){

			$this->RetrieveData();
			return $this->careerList;
		}
	}

 ?>