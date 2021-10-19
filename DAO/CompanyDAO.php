<?php
    namespace DAO;

    use Models\Company as Company;

    class CompanyDao
    {
        private $companyList = array();

        public function Add(Company $company)
        {
            $this->RetrieveData();
            
            array_push($this->companyList, $company);

            $this->SaveData();
        }

        public function Modify($id,$name,$street,$nacionality,$description)
        {
            $this->RetrieveData();

            foreach($this->companyList as $value)
            {
                if($value->getId()==$id)
                {
                    $value->setName($name);
                    $value->setStreet($street);
                    $value->setNacionality($nacionality);
                    $value->setDescription($description);
                }
            }

            $this->SaveData();
        }
 
        public function Delete($id)
        {
            $this->RetrieveData();

            foreach($this->companyList as $value)
            {
                if($value->getId() == $id)
                {
                    $value->setActive(false);
                }
            }            

            $this->SaveData();            
        }
        

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->companyList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->companyList as $company)
            {
                $valuesArray["id"] = $company->getId();
                $valuesArray["name"] = $company->getName();
                $valuesArray["street"] = $company->getStreet();
                $valuesArray["nacionality"] = $company->getNacionality();
                $valuesArray["description"] = $company->getDescription();
                $valuesArray["active"] = $company->getActive();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/companies.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->companyList = array();

            if(file_exists('Data/companies.json'))
            {
                $jsonContent = file_get_contents('Data/companies.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $company = new Company($valuesArray["id"],$valuesArray["name"],$valuesArray["street"],$valuesArray["nacionality"],$valuesArray["description"], $valuesArray["active"]);

                    array_push($this->companyList, $company);
                }
            }
        }

        public function SearchCompany($name)
        {
            $this->RetrieveData();
            $company = null;

            foreach($this->companyList as $value)
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
            $this->RetrieveData();
            $company = null;

            foreach($this->companyList as $value)
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
            $this->RetrieveData();

            return count($this->companyList);
        }
        
    }
?>