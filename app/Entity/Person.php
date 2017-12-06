<?php

namespace App\Entity;

use App\Entity\Traits\IdentifierTrait;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
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
	 * @ORM\ManyToMany(targetEntity="Project", inversedBy="persons", fetch="LAZY")
	 * @var Project[]
	 */
	private $projects;


	/**
	 * @param string $firstName
	 * @param string $lastName
	 */
	public function __construct($firstName, $lastName)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->projects = new ArrayCollection;
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


	/**
	 * @return Project[]
	 */
	public function getProjects()
	{
		return $this->projects;
	}


	public function addProject(Project $project)
	{
		if ( ! $this->projects->contains($project)) {
			$this->projects->add($project);
		}
	}


	public function removeProject(Project $project)
	{
		$this->projects->removeElement($project);
	}

}
