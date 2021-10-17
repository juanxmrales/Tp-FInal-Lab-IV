<?php
    namespace Models;

    class Company
    {
        private $id;
        private $name;
        private $street;
        private $nacionality;
        private $description;
        private $active;  // True: active. False: removed//
        
        /**
		 * Class Constructor
		 * @param    $id   
		 * @param    $name   
		 * @param    $street
                 * @param    $nacionality
                 * @param    $description
                 * @param    $active
		 */
        public function __construct($id, $name, $street, $nacionality, $description, $active)
        {
                $this->id = $id;
                $this->name = $name;
                $this->street = $street;
                $this->nacionality = $nacionality;
                $this->description = $description;
                $this->active = $active;
        }

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getName()
        {
                return $this->name;
        }

        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        public function getStreet()
        {
                return $this->street;
        }

        public function setStreet($street)
        {
                $this->street = $street;

                return $this;
        }

        public function getNacionality()
        {
                return $this->nacionality;
        }

        public function setNacionality($nacionality)
        {
                $this->nacionality = $nacionality;

                return $this;
        }

        public function getDescription()
        {
                return $this->description;
        }

        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        public function getActive()
        {
                return $this->active;
        }

        public function setActive($active)
        {
                $this->active = $active;

                return $this;
        }
    }
?>