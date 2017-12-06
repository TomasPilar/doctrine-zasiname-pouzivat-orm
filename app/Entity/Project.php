<?php

namespace App\Entity;

use App\Entity\Traits\IdentifierTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="project")
 */
class Project
{

	use IdentifierTrait;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	private $name;

	/**
	 * @ORM\ManyToMany(targetEntity="Person", mappedBy="projects", fetch="LAZY")
	 * @var Person[]
	 */
	private $persons;

	/**
	 * @ORM\OneToMany(targetEntity="Todo", mappedBy="project", fetch="EXTRA_LAZY")
	 * @var Todo[]
	 */
	private $todos;


	/**
	 * @param string $name
	 */
	public function __construct($name)
	{
		$this->name = $name;
		$this->persons = new ArrayCollection;
		$this->todos = new ArrayCollection;
	}


	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}


	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}


	/**
	 * @return Person[]
	 */
	public function getPersons()
	{
		return $this->persons;
	}


	public function addPerson(Person $person)
	{
		if ( ! $this->persons->contains($person)) {
			$this->persons->add($person);
		}
	}


	public function removePerson(Person $person)
	{
		$this->persons->removeElement($person);
	}


	/**
	 * @return Todo[]
	 */
	public function getTodos()
	{
		return $this->todos;
	}


	public function addTodo(Todo $todo)
	{
		if ( ! $this->todos->contains($todo)) {
			$this->todos->add($todo);
		}
	}


	public function removeTodo(Todo $todo)
	{
		$this->todos->removeElement($todo);
	}

}
