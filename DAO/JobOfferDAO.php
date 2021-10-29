<?php

    namespace DAO;

use Models\JobOffer;
use \Exception as Exception;

class JobOfferDAO
    {
        private $connection;
        private $tableName = "joboffers";

        public function Add(JobOffer $job)
        {

            try
            {
                $query = "INSERT INTO ".$this->tableName." (id_jobPosition, id_company, fecha, description, active) VALUES (:id_jobPosition, :id_company, :fecha, :description, :active);";
                
                $parameters["id_jobPosition"] = $job->getIdJobPosition();
                $parameters["id_company"] = $job->getIdCompany();
                $parameters["fecha"] = $job->getFecha();
                $parameters["description"] = $job->getDescription();
                $parameters["active"] = $job->getActive();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {
            try
            {
                $userXJobDAO = new UserXJobOfferDAO();

                $jobList = array();
                $userXJobList = $userXJobDAO->GetAll();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {
                    $userList = array();

                    foreach($userXJobList as $value)
                    {
                        if($value->getJobOfferId()==$row["id"])
                        {
                            array_push($userList,$value->getUserId());
                        }
                    }

                    $job = new JobOffer($row["id"],$row["id_jobPosition"],$row["id_company"],$row["fecha"],$row["description"],$row["active"],$userList);

                    $userList = null;

                    array_push($jobList, $job);
                }

                return $jobList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }

?>