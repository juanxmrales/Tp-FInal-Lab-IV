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
                $query = "INSERT INTO ".$this->tableName." (id_usuario, id_jobOffer) VALUES (:id_usuario, :id_jobOffer)";
                
                $parameters["id_usuario"] = $userXJob->getUserId();
                $parameters["id_jobOffer"] = $userXJob->getJobOfferId();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

                return "Postulacion exitosa";
            }
            catch(Exception $ex)
            {   
                return "Usted ya se encontraba postulado anteriormente";
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

        public function GetByJobOfferId($id)
        {
            try
            {
                $list = array();

                $query = "SELECT * FROM $this->tableName WHERE id_jobOffer = $id";

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

        public function GetByUserId($id)
        {
            try
            {
                $list = array();

                $query = "SELECT * FROM $this->tableName WHERE id_usuario = $id";

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