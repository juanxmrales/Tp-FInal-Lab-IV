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
                $query = "INSERT INTO ".$this->tableName." (id_jobPosition, jobPosition, career, id_company, company, fecha, description) VALUES (:id_jobPosition, :jobPosition, :career, :id_company, :company, :fecha, :description);";
                
                $parameters["id_jobPosition"] = $job->getIdJobPosition();
                $parameters["jobPosition"] = $job->getJobPosition();
                $parameters["id_company"] = $job->getIdCompany();
                $parameters["company"] = $job->getCompany();
                $parameters["career"] = $job->getCareer();
                $parameters["fecha"] = $job->getFecha();
                $parameters["description"] = $job->getDescription();

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

                    $job = new JobOffer($row["id"],$row["id_jobPosition"],$row["jobPosition"],$row["id_company"],$row["company"],$row["career"],$row["fecha"],$row["description"],$userList);

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

        public function GetById($id)
        {
            try
            {
                $userXJobDAO = new UserXJobOfferDAO();

                $jobList = array();
                $userXJobList = $userXJobDAO->GetAll();

                $query = "SELECT * FROM $this->tableName WHERE id = $id";

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

                    $job = new JobOffer($row["id"],$row["id_jobPosition"],$row["jobPosition"],$row["id_company"],$row["company"],$row["career"],$row["fecha"],$row["description"],$userList);

                    $userList = null;
                }

                return $job;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Modify(JobOffer $job){

            try{

                $query = "UPDATE $this->tableName SET id_jobPosition = :id_jobPosition , jobPosition = :jobPosition , id_company = :id_company , company = :company , career = :career , fecha = :fecha , description = :description  WHERE id = :id";

                $parameters["id"] = $job->getId();
                $parameters["id_jobPosition"] = $job->getIdJobPosition();
                $parameters["jobPosition"] = $job->getJobPosition();
                $parameters["id_company"] = $job->getIdCompany();
                $parameters["company"] = $job->getCompany();
                $parameters["career"] = $job->getCareer();
                $parameters["fecha"] = $job->getFecha();
                $parameters["description"] = $job->getDescription();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex){

                throw $ex;
            }
        }


        public function Delete($id){

            try{

                $query = "DELETE FROM $this->tableName WHERE id = $id;";

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex){

                throw $ex;
            }
        }

        

    }

?>