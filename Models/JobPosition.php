<?php 

	namespace Models;


class JobPosition{

		
	private $id;
	private $carrerId;
	private $description;


	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $carrerId   
	 * @param    $description   
	 */
	public function __construct($id, $carrerId, $description)
	{
		$this->id = $id;
		$this->carrerId = $carrerId;
		$this->description = $description;
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
    public function getCarrerId()
    {
        return $this->carrerId;
    }

    /**
     * @param mixed $carrerId
     *
     * @return self
     */
    public function setCarrerId($carrerId)
    {
        $this->carrerId = $carrerId;

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
}

?>