<?php
    namespace Models;

    use Models\Person as Person;

    class Student extends Person
    {
        private $studentID;
        private $carrerId;
        private $dni;
        private $fileNumber;
        private $gender;
        private $birthDate;
        private $email;
        private $phoneNumber;
        private $active;

        public function getStudentId()
        {
            return $this->recordId;
        }

        public function setStudentId($studentID)
        {
            $this->recordId = $studentID;
        }

        public function getCarrerId()
        {
            return $this->carrerId;
        }

        public function setCarrerId($carrerId)
        {
            $this->recordId = $carrerId;
        }
        
    }
?>

