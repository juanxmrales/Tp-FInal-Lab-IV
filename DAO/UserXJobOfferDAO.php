<?php

    namespace DAO;
    
    use \Exception as Exception;
    use Models\UserXJobOffer;

    class UserXJobOfferDAO
    {
        private $connection;
        private $tableName = "usersxjoboffers";

        public function Add(UserXJobOffer $userXJob)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (id_usuario, id_jobOffer) VALUES (:password, :type);";
                
                $parameters["id_usuario"] = $userXJob->getUserId();
                $parameters["id_jobOffer"] = $userXJob->getJobOfferId();

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
                $list = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach($resultSet as $row)
                {                
                    $userXJob = new UserXJobOffer($row["id_usuario"],$row["id_jobOffer"]);

                    array_push($list, $userXJob);
                }

                return $list;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>