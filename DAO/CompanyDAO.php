<?php
    namespace DAO;

    use \Exception as Exception;
    use Models\Company as Company;

    class CompanyDao
    {
        private $connection;
        private $tableName = "companies";

        public function Add(Company $company)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (id,name,street,nationality,description, id_usuario) VALUES (:id,:name,:street,:nationality,:description, :id_usuario);";
                
                $parameters["id"] = $company->getId();
                $parameters["name"] = $company->getName();
                $parameters["street"] = $company->getStreet();
                $parameters["nationality"] = $company->getNacionality();
                $parameters["description"] = $company->getDescription();
                $parameters["id_usuario"] = $company->getIdusuario();


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
                $companyList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $company = new Company($row["id"],$row["name"],$row["street"],$row["nationality"],$row["description"], $row["id_usuario"]);

                    array_push($companyList, $company);
                }

                return $companyList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }


        public function Modify(Company $company){

            try{

                $query = "UPDATE $this->tableName SET name = :name , street = :street , nationality = :nationality , description = :description WHERE id = :id;";

                $parameters["id"] = $company->getId();
                $parameters["name"] = $company->getName();
                $parameters["street"] = $company->getStreet();
                $parameters["nationality"] = $company->getNacionality();
                $parameters["description"] = $company->getDescription();

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


        // Busca una compania en la base de datos a traves de su nombre,
        // :$company si existe, :null si no existe
        public function SearchCompany($name)
        {
            $companyList = $this->GetAll();
            $company = null;

            foreach($companyList as $value)
            {
                if($value->getName() == $name)
                {
                    $company = $value;
                }
            }

            return $company;
        }


        public function SearchCompanyById($id)
        {
            $companyList = $this->GetAll();
            $company = null;

            foreach($companyList as $value)
            {
                if($value->getId() == $id)
                {
                    $company = $value;
                }
            }

            return $company;
        }

        public function SearchByUserId($id){

            try
            {
                $companyList = array();

                $query = "SELECT * FROM $this->tableName WHERE id_usuario = $id";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                                      
                $row = $resultSet[0];
                
                $company = new Company($row["id"],$row["name"],$row["street"],$row["nationality"],$row["description"], $row["id_usuario"]);

                return $company->getId();
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        
    }
?>