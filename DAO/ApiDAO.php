<?php 

	namespace DAO;

	class ApiDAO{

		public static function retrieveCareers(){

				/*$opt = array(
					  "http" => array(
					  "method" => "GET",
					  "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
					)
				);
				
				$ctx = stream_context_create($opt);
				
				$jsonCarreras = file_get_contents("https://utn-students-api.herokuapp.com/api/Career", false, $ctx);*/
				
				$jsonCarreras = file_get_contents("Data/Carrers.json", false);

				$arrayCarreras = ($jsonCarreras) ? json_decode($jsonCarreras, true) : array();

				return $arrayCarreras;

		}


		public static function retrieveStudents(){

				/*$opt = array(
					  "http" => array(
					  "method" => "GET",
					  "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
					)
				);
				
				$ctx = stream_context_create($opt);
				
				$jsonStudents = file_get_contents("https://utn-students-api.herokuapp.com/api/Student", false, $ctx);*/

				$jsonStudents = file_get_contents("Data/Students.json", false);
				
				$arrayStudents = ($jsonStudents) ? json_decode($jsonStudents, true) : array();

				return $arrayStudents;

		}


		public static function retrieveJobPosition(){

				/*$opt = array(
					  "http" => array(
					  "method" => "GET",
					  "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
					)
				);
				
				$ctx = stream_context_create($opt);
				
				$jsonJobPosition = file_get_contents("https://utn-students-api.herokuapp.com/api/JobPosition", false, $ctx);*/

				$jsonJobPosition = file_get_contents("Data/JobPosition.json", false);
				
				$arrayJobPosition = ($jsonJobPosition) ? json_decode($jsonJobPosition, true) : array();

				return $arrayJobPosition;

		}
	}

 ?>