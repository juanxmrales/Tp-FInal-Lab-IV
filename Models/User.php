<?php 

	namespace Models;

	class User{

		private $email;
		private $password;
		private $type; /* 0 -> Student // 1 -> Admin // 2 -> Empresa */


		/**
		 * Class Constructor
		 * @param    $email   
		 * @param    $password   
		 * @param    $type   
		 */
		public function __construct($email, $password, $type)
		{
			$this->email = $email;
			$this->password = $password;
			$this->type = $type;
		}


	    /**
	     * @return mixed
	     */
	    public function getEmail()
	    {
	        return $this->email;
	    }

	    /**
	     * @param mixed $email
	     *
	     * @return self
	     */
	    public function setEmail($email)
	    {
	        $this->email = $email;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getPassword()
	    {
	        return $this->password;
	    }

	    /**
	     * @param mixed $password
	     *
	     * @return self
	     */
	    public function setPassword($password)
	    {
	        $this->password = $password;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getType()
	    {
	        return $this->type;
	    }

	    /**
	     * @param mixed $type
	     *
	     * @return self
	     */
	    public function setType($type)
	    {
	        $this->type = $type;

	        return $this;
	    }
}

 ?>













