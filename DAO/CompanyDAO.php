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
                $query = "INSERT INTO ".$this->tableName." (id,name,street,nacionality,description,active) VALUES (:id,:name,:street,:nacionality,:description,:active);";
                
                $parameters["id"] = $company->getId();
                $parameters["name"] = $company->getName();
                $parameters["street"] = $company->getStreet();
                $parameters["nacionality"] = $company->getNacionality();
                $parameters["description"] = $company->getDescription();
                $parameters["active"] = $company->getActive();

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
                    $company = new Company($row["id"],$row["name"],$row["street"],$row["nacionality"],$row["description"],$row["active"]);

                    array_push($companyList, $company);
                }

                return $companyList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

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

        public function CountRecords()
        {
            $companyList = $this->GetAll();

            return count($this->companyList);
        }
        
    }
?>