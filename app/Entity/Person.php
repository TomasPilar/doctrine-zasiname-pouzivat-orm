<?php

namespace App\Entity;

use App\Entity\Traits\IdentifierTrait;
use DateTime;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="person")
 */
class Person
{

	use IdentifierTrait;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	private $firstName;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	private $lastName;

	/**
	 * @ORM\Column(type="datetime", nullable=TRUE)
	 * @var DateTime
	 */
	private $updatedAt;


	/**
	 * @param string $firstName
	 * @param string $lastName
	 */
	public function __construct($firstName, $lastName)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}


	/**
	 * @return string
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}


	/**
	 * @param string $firstName
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}


	/**
	 * @return string
	 */
	public function getLastName()
	{
		return $this->lastName;
	}


	/**
	 * @param string $lastName
	 */
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}


	public function getName()
	{
		return $this->getFirstName() . ' ' . $this->getLastName();
	}


	/**
	 * @return DateTime
	 */
	public function getUpdatedAt()
	{
		return $this->updatedAt;
	}


	/**
	 * @param DateTime $updatedAt
	 */
	public function setUpdatedAt($updatedAt)
	{
		$this->updatedAt = $updatedAt;
	}

}
