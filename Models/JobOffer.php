<?php

    namespace Models;

    class JobOffer
    {
        private $id;
        private $idJobPosition;
        private $idCompany;
        private $fecha;
        private $descripcion;
        private $activo;

        public function __construct($id,$idJobPosition,$idCompany,$fecha,$descripcion,$activo)
        {
            $this->id = $id;
            $this->idJobPosition = $idJobPosition;
            $this->idCompany = $idCompany;
            $this->fecha = $fecha;
            $this->descripcion = $descripcion;
            $this->activo = $activo;
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
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        /**
         * Get the value of activo
         */ 
        public function getActivo()
        {
                return $this->activo;
        }

        /**
         * Set the value of activo
         *
         * @return  self
         */ 
        public function setActivo($activo)
        {
                $this->activo = $activo;

                return $this;
        }
    }
?>