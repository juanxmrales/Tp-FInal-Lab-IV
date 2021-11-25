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
                $query = "INSERT INTO ".$this->tableName." (id_usuario, id_jobOffer, cv) VALUES (:id_usuario, :id_jobOffer, :cv)";
                
                $parameters["id_usuario"] = $userXJob->getUserId();
                $parameters["id_jobOffer"] = $userXJob->getJobOfferId();
                $parameters["cv"] = $userXJob->getCv();

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
                    $userXJob = new UserXJobOffer($row["id_usuario"],$row["id_jobOffer"],$row['cv']);

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
                    $userXJob = new UserXJobOffer($row["id_usuario"],$row["id_jobOffer"],$row['cv']);

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
                    $userXJob = new UserXJobOffer($row["id_usuario"],$row["id_jobOffer"],$row['cv']);

                    array_push($list, $userXJob);
                }

                return $list;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Delete($idUser, $idJob)
        {
            try
            {
                $query = "DELETE FROM $this->tableName WHERE id_usuario = :idUser and id_jobOffer = :idJob";
                
                $parameters["idUser"] = $idUser;
                $parameters["idJob"] = $idJob;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            }
            catch(Exception $ex)
            {   
                throw $ex;
            }
        }

        

    }
?>