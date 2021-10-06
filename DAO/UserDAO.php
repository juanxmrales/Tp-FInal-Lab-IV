<?php
    namespace DAO;

    use JetBrains\PhpStorm\Internal\ReturnTypeContract;
    use Models\User as User;

    class UserDAO
    {
        private $userList = array();

        public function Add(User $user)
        {
            $this->RetrieveData();
            
            array_push($this->userList, $user);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->userList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->userList as $user)
            {
                $valuesArray["email"] = $user->getEmail();
                $valuesArray["password"] = $user->getPassword();
                $valuesArray["type"] = $user->getType();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/users.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->userList = array();

            if(file_exists('Data/users.json'))
            {
                $jsonContent = file_get_contents('Data/users.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $user = new User($valuesArray["recordId"],$valuesArray["firstName"],$valuesArray["lastName"]);

                    array_push($this->userList, $user);
                }
            }
        }

        public function exist($email,$password)
        {
            $this->RetrieveData();
            $flag = false;

            foreach($this->userList as $value)
            {
                if($value['email'] == $email && $value['password'] == $password)
                {
                    $flag = true;
                }
            }

            return $flag;
        }
    }
?>