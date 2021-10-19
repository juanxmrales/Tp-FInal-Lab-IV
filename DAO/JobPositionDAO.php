<?php
    namespace DAO;

    use Models\JobPosition as JobPosition;

    class JobPositionDAO
    {
        private $jobPositionList = array();

        public function Add($jobPosition)
        {
            $this->RetrieveData();
            
            array_push($this->jobPositionList, $jobPosition);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->jobPositionList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->jobPositionList as $jobPosition)
            {
                $valuesArray["id"] = $jobPosition->getId();
                $valuesArray["name"] = $jobPosition->getName();
                $valuesArray["companyId"] = $jobPosition->getCompanyId();
                $valuesArray["description"] = $jobPosition->getDescription();
                $valuesArray["proposedStudents"] = $jobPosition->getProposedStudents();
                $valuesArray["career"] = $jobPosition->getCareer();
                $valuesArray["active"] = $jobPosition->getActive();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/jobPosition.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->jobPositionList = array();

            if(file_exists('Data/jobPosition.json'))
            {
                $jsonContent = file_get_contents('Data/jobPosition.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $jobPosition = new JobPosition($valuesArray["id"],$valuesArray["name"],$valuesArray["companyId"],$valuesArray["description"],$valuesArray["active"],$valuesArray["career"],$valuesArray["proposedStudents"]);

                    array_push($this->jobPositionList, $jobPosition);
                }
            }
        }

        public function applyById($idJob, $email){

            $this->RetrieveData();

            foreach($this->jobPositionList as $value)
            {
                if($value->getId() == $idJob)
                {   
                    $value->pushProposedStudent($email);
                }
            }
            
            $this->SaveData();
        }

        public function CountRecords()
        {   
            $this->RetrieveData();
            return count($this->jobPositionList);
        }


    }
?>