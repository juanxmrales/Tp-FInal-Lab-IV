<?php

    namespace Models;

    class JobOffer
    {
        private $id;
        private $idJobPosition;
        private $idCompany;
        private $fecha;
        private $description;
        private $active;
        private $users = array();

        public function __construct($id,$idJobPosition,$idCompany,$fecha,$description,$active,$users = array())
        {
            $this->id = $id;
            $this->idJobPosition = $idJobPosition;
            $this->idCompany = $idCompany;
            $this->fecha = $fecha;
            $this->description = $description;
            $this->active = $active;
            $this->users = $users;
        }

        
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of idJobPosition
         */ 
        public function getIdJobPosition()
        {
                return $this->idJobPosition;
        }

        /**
         * Set the value of idJobPosition
         *
         * @return  self
         */ 
        public function setIdJobPosition($idJobPosition)
        {
                $this->idJobPosition = $idJobPosition;

                return $this;
        }

        /**
         * Get the value of idCompany
         */ 
        public function getIdCompany()
        {
                return $this->idCompany;
        }

        /**
         * Set the value of idCompany
         *
         * @return  self
         */ 
        public function setIdCompany($idCompany)
        {
                $this->idCompany = $idCompany;

                return $this;
        }

        /**
         * Get the value of fecha
         */ 
        public function getFecha()
        {
                return $this->fecha;
        }

        /**
         * Set the value of fecha
         *
         * @return  self
         */ 
        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

        /**
         * Get the value of descripcion
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of activo
         */ 
        public function getActive()
        {
                return $this->active;
        }

        /**
         * Set the value of activo
         *
         * @return  self
         */ 
        public function setActive($active)
        {
                $this->active = $active;

                return $this;
        }

        /**
         * Get the value of users
         */ 
        public function getUsers()
        {
                return $this->users;
        }

        /**
         * Set the value of users
         *
         * @return  self
         */ 
        public function setUsers($users)
        {
                $this->users = $users;

                return $this;
        }

        public function ExistPostulation($email)
        {
                $flag = false;
                $list = $this->getUsers();

                foreach($list as $value)
                {
                        if($value == $email)
                        {
                                $flag == true;
                        }
                }

                return $flag;
        }
    }
?>