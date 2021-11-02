<?php
    namespace DAO;

    use JetBrains\PhpStorm\Internal\ReturnTypeContract;
    use \Exception as Exception;
    use Models\User as User;

    class UserDAO
    {
        private $connection;
        private $tableName = "users";

        public function Add(User $user)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (email, password, type) VALUES (:email, :password, :type);";
                
                $parameters["email"] = $user->getEmail();
                $parameters["password"] = $user->getPassword();
                $parameters["type"] = $user->getType();

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
                    $user = new User($row["id"], $row["email"],$row["password"],$row["type"]);

                    array_push($userList, $user);
                }

                return $userList;
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
                $userList = array();

                $query = "SELECT * FROM $this->tableName WHERE id = $id";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $user = new User($row["id"], $row["email"],$row["password"],$row["type"]);

                    array_push($userList, $user);
                }

                return $userList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function exist($email,$password)
        {
            $userList = $this->GetAll();
            $flag = false;

            foreach($userList as $value)
            {
                if($value->getEmail() == $email && $value->getPassword() == $password)
                {
                    $flag = true;
                }
            }

            return $flag;
        }

        public function searchUser($email)
        {
            $userList = $this->GetAll();
            $user = null;

            foreach($userList as $value)
            {
                if($value->getEmail() == $email)
                {
                    $user = $value;
                }
            }

            return $user;
        }
    }
?>