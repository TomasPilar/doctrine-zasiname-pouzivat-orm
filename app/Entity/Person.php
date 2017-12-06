<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="person")
 */
class Person
{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 * @var int
	 */
	private $id;

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
	 * @ORM\Column(type="datetime")
	 * @var DateTime
	 */
	private $updatedAt;


	/**
	 * @param string $firstName
	 * @param string $lastName
	 * @param DateTime $updatedAt
	 */
	public function __construct($firstName, $lastName, DateTime $updatedAt)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->updatedAt = $updatedAt;
	}


	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
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