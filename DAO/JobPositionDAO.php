<?php
    namespace DAO;

    use Models\JobPosition as JobPosition;

    class JobPositionDAO
    {
        private $jobPositionList = array();

        public function RetrieveData(){

            $jsonJobPosition = ApiDAO::retrieveJobPosition();

            foreach($jsonJobPosition as $jobPosition){

                $newJobPosition = new JobPosition($jobPosition["jobPositionId"], $jobPosition["careerId"], $jobPosition["description"]);
                array_push($this->jobPositionList, $newJobPosition);  
            }
        }

        public function GetAll(){

            $this->RetrieveData();
            return $this->jobPositionList;
        }

        public function SearchJobPositionById($id)
        {
            $this->RetrieveData();
            $jobPosition = null;

            foreach($this->jobPositionList as $value)
            {
                if($value->getId()==$id)
                {
                    $jobPosition = $value;
                }
            }

            return $jobPosition;
        }
        

        /*public function applyById($idJob, $email){

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

        */


    }
?>