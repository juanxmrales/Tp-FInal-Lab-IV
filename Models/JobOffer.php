<?php 

	namespace Models;

	class JobOffer{

		private $id;
        private $idJobPosition;
        private $jobPosition;
        private $idCompany;
        private $company;
        private $career;
        private $fecha;
        private $description;
		private $imagen;
        private $users;


		/**
		 * Class Constructor
		 * @param    $id   
		 * @param    $idJobPosition   
		 * @param    $jobPosition   
		 * @param    $idCompany   
		 * @param    $company   
		 * @param    $career   
		 * @param    $fecha   
		 * @param    $description   
		 * @param    $users   
		 */
		public function __construct($id, $idJobPosition, $jobPosition, $idCompany, $company, $career, $fecha, $description, $imagen = null, $users = array())
		{
			$this->id = $id;
			$this->idJobPosition = $idJobPosition;
			$this->jobPosition = $jobPosition;
			$this->idCompany = $idCompany;
			$this->company = $company;
			$this->career = $career;
			$this->fecha = $fecha;
			$this->description = $description;
			$this->imagen = $imagen;
			$this->users = $users;
		}


	    /**
	     * @return mixed
	     */
	    public function getId()
	    {
	        return $this->id;
	    }

	    /**
	     * @param mixed $id
	     *
	     * @return self
	     */
	    public function setId($id)
	    {
	        $this->id = $id;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getIdJobPosition()
	    {
	        return $this->idJobPosition;
	    }

	    /**
	     * @param mixed $idJobPosition
	     *
	     * @return self
	     */
	    public function setIdJobPosition($idJobPosition)
	    {
	        $this->idJobPosition = $idJobPosition;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getJobPosition()
	    {
	        return $this->jobPosition;
	    }

	    /**
	     * @param mixed $jobPosition
	     *
	     * @return self
	     */
	    public function setJobPosition($jobPosition)
	    {
	        $this->jobPosition = $jobPosition;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getIdCompany()
	    {
	        return $this->idCompany;
	    }

	    /**
	     * @param mixed $idCompany
	     *
	     * @return self
	     */
	    public function setIdCompany($idCompany)
	    {
	        $this->idCompany = $idCompany;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getCompany()
	    {
	        return $this->company;
	    }

	    /**
	     * @param mixed $company
	     *
	     * @return self
	     */
	    public function setCompany($company)
	    {
	        $this->company = $company;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getCareer()
	    {
	        return $this->career;
	    }

	    /**
	     * @param mixed $career
	     *
	     * @return self
	     */
	    public function setCareer($career)
	    {
	        $this->career = $career;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getFecha()
	    {
	        return $this->fecha;
	    }

	    /**
	     * @param mixed $fecha
	     *
	     * @return self
	     */
	    public function setFecha($fecha)
	    {
	        $this->fecha = $fecha;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getDescription()
	    {
	        return $this->description;
	    }

	    /**
	     * @param mixed $description
	     *
	     * @return self
	     */
	    public function setDescription($description)
	    {
	        $this->description = $description;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getUsers()
	    {
	        return $this->users;
	    }

	    /**
	     * @param mixed $users
	     *
	     * @return self
	     */
	    public function setUsers($users)
	    {
	        $this->users = $users;

	        return $this;
	    }

	    public function ExistPostulation($id)
        {
                $list = $this->getUsers();

                return in_array($id, $list);
        }

		/**
		 * Get the value of imagen
		 */ 
		public function getImagen()
		{
				return $this->imagen;
		}

		/**
		 * Set the value of imagen
		 *
		 * @return  self
		 */ 
		public function setImagen($imagen)
		{
				$this->imagen = $imagen;

				return $this;
		}
}

 ?>