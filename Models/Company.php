<?php
    namespace Models;

    class Company
    {
        private $Id;
        private $Name;
        private $Street;
        private $Nacionality;
        private $Description;

        public function getId()
        {
                return $this->Id;
        }

        public function setId($Id)
        {
                $this->Id = $Id;
        }

        public function getName()
        {
                return $this->Name;
        }

        public function setName($Name)
        {
                $this->Name = $Name;
        }

        public function getStreet()
        {
                return $this->Street;
        }

        public function setStreet($Street)
        {
                $this->Street = $Street;
        }

        public function getNacionality()
        {
                return $this->Nacionality;
        }

        public function setNacionality($Nacionality)
        {
                $this->Nacionality = $Nacionality;
        }

        public function getDescription()
        {
                return $this->Description;
        }

        public function setDescription($Description)
        {
                $this->Description = $Description;
        }
    }
?>