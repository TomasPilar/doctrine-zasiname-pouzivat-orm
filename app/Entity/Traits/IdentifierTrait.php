<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait IdentifierTrait
{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 * @var int
	 */
	private $id;


	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

}
