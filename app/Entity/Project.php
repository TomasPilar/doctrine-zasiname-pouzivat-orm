<?php

namespace App\Entity;

use App\Entity\Traits\IdentifierTrait;
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
	 * @param string $name
	 */
	public function __construct($name)
	{
		$this->name = $name;
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

}
