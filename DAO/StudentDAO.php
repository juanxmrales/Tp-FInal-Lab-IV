<?php
    namespace DAO;

    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;
    use Dao\ApiDAO as ApiDAO;

    class StudentDAO
    {
        private $studentList = array();

        public function GetAll()
        {
            $this->RetrieveDataStudentsAPI();

            return $this->studentList;
        }

        private function RetrieveDataStudentsAPI()
        {
            $newArray = ApiDAO::retrieveStudents();

            foreach($newArray as $valuesArray)
            {
                $student = new Student();

                $student->setStudentId($valuesArray["studentId"]);
                $student->setFirstName($valuesArray["firstName"]);
                $student->setLastName($valuesArray["lastName"]);
                $student->setCarrerId($valuesArray["careerId"]);
                $student->setDni($valuesArray["dni"]);
                $student->setFileNumber($valuesArray["fileNumber"]);
                $student->setGender($valuesArray["gender"]);
                $student->setBirthDate($valuesArray["birthDate"]);
                $student->setEmail($valuesArray["email"]);
                $student->setPhoneNumber($valuesArray["phoneNumber"]);
                $student->setActive($valuesArray["active"]);

                array_push($this->studentList, $student);
            }
        }

        public function SearchStudentByDNI($dni)
        {
            $this->RetrieveDataStudentsAPI();
            $student = null;

            foreach($this->studentList as $value)
            {
                if($value->getDni() == $dni)
                {
                    $student = $value;
                }
            }

            return $student;
        }

        public function SearchStudentByEmail($email)
        {
            $this->RetrieveDataStudentsAPI();

            $student = null;

            foreach($this->studentList as $value)
            {
                if($value->getEmail() == $email)
                {
                    $student = $value;
                }
            }
            return $student;
        }

    }
?>