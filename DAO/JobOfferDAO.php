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
                $query = "INSERT INTO ".$this->tableName." (email, password, type) VALUES (:email, :password, :type);";
                
                $parameters["id"] = $job->getId();
                $parameters["idJobPosition"] = $job->getIdJobPosition();
                $parameters["idCompany"] = $job->getIdCompany();
                $parameters["fecha"] = $job->getFecha();
                $parameters["description"] = $job->getIdCompany();
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
                $userList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $job = new JobOffer($row["id"],$row["idJobPosition"],$row["idCompany"],$row["fecha"],$row["description"],$row["active"]);

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