<?php 

	namespace Models;

	class JobPosition{

		private $name;
		private $companyId;
		private $proposedStudents;
		private $description;
		private $id;

		public function __construct($id,$name, $companyId, $description,$proposedStudents = ""){

			$this->id = $id;
			$this->name = $name;
			$this->companyId = $companyId;
			$this->description = $description;
			$this->proposedStudents = $proposedStudents;
		}

	
	    /**
	     * @return mixed
	     */
	    public function getName()
	    {
	        return $this->name;
	    }

	    /**
	     * @param mixed $name
	     *
	     * @return self
	     */
	    public function setName($name)
	    {
	        $this->name = $name;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getCompanyId()
	    {
	        return $this->companyId;
	    }

	    /**
	     * @param mixed $companyId
	     *
	     * @return self
	     */
	    public function setCompanyId($companyId)
	    {
	        $this->companyId = $companyId;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getProposedStudents()
	    {
	        return $this->proposedStudents;
	    }

	    /**
	     * @param mixed $proposedStudents
	     *
	     * @return self
	     */
	    public function setProposedStudents($proposedStudents)
	    {
	        $this->proposedStudents = $proposedStudents;

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
}

 ?>