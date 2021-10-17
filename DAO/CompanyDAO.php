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

        /**
        public function Remove()
        {
            $jsonContent= file_get_contents('Data/companies.json');

            $json = json_decode($jsonContent, true);

            foreach($json as $userJson=>$val)
            {
                if($val['UserId']==$usuario)
                {
                    unset($json[$userJson]);
                }
            }
            file_put_contents("_Notifications.json", json_encode($json, JSON_FORCE_OBJECT)); 
        }
        */

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
                    $company = new Company($valuesArray["id"],$valuesArray["name"],$valuesArray["street"],$valuesArray["nacionality"],$valuesArray["description"]);

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

        public function CountRecords()
        {
            return count($this->companyList);
        }
    }
?>