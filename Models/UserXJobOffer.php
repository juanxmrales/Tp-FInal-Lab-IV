<?php

    namespace Models;

    class UserXJobOffer
    {
        private $userId;
        private $jobOfferId;
        private $cv; //URL

        public function __construct($userId,$jobOfferId,$cv)
        {
            $this->userId = $userId;
            $this->jobOfferId = $jobOfferId;
            $this->cv = $cv;
        }

        /**
         * Get the value of userId
         */ 
        public function getUserId()
        {
                return $this->userId;
        }

        /**
         * Set the value of userId
         *
         * @return  self
         */ 
        public function setUserId($userId)
        {
                $this->userId = $userId;

                return $this;
        }

        /**
         * Get the value of jobOfferId
         */ 
        public function getJobOfferId()
        {
                return $this->jobOfferId;
        }

        /**
         * Set the value of jobOfferId
         *
         * @return  self
         */ 
        public function setJobOfferId($jobOfferId)
        {
                $this->jobOfferId = $jobOfferId;

                return $this;
        }



        /**
         * Get the value of imagen
         */ 
        public function getCv()
        {
                return $this->cv;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */ 
        public function setCv($cv)
        {
                $this->cv = $cv;

                return $this;
        }
}

?>