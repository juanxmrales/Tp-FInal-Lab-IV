<?php 

	namespace Models;

	class JobPosition{

		private $name;
		private $companyId;
		private $proposedStudents = array();
		private $description;
		private $id;
		private $active;
		private $career;

		public function __construct($id,$name,$companyId,$description,$active,$career,$proposedStudents = array()){

			$this->id = $id;
			$this->name = $name;
			$this->companyId = $companyId;
			$this->description = $description;
			$this->proposedStudents = $proposedStudents;
			$this->career = $career;
			$this->active = $active;
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

	    public function getCompanyId()
	    {
	        return $this->companyId;
	    }

	    public function setCompanyId($companyId)
	    {
	        $this->companyId = $companyId;

	        return $this;
	    }

	    public function getProposedStudents()
	    {
	        return $this->proposedStudents;
	    }

	    public function setProposedStudents($proposedStudents)
	    {
	        $this->proposedStudents = $proposedStudents;
	    }

		public function pushProposedStudent($email)
		{
			array_push($this->proposedStudents, $email);
		}

	    public function getCareer()
	    {
	        return $this->career;
	    }

	    public function setCareer($career)
	    {
	        $this->career = $career;

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

	    public function getId()
	    {
	        return $this->id;
	    }

	    public function setId($id)
	    {
	        $this->id = $id;

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