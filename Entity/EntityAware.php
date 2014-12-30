<?php

trait EntityAware
{
	/**
	 * @var string $name
	 */
	protected $name;

	/**
	 * @var string $description
	 */
	protected $description;

	/**
	 * @var date $date
	 */
	protected $date;

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return $this
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	
		return $this;
	}

	/**
	 * @return \DateTime 
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * @param \DateTime
	 * @return $this
	 */
	public function setDate(\DateTime $date)
	{
		$this->date = $date;

		return $this;
	}	
}
