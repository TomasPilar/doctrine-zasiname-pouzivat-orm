<?php

namespace App\Model;

use App\Entity\Person;
use Doctrine\ORM\EntityManager;


final class PersonRepository
{

	/**
	 * @var EntityManager
	 */
	private $entityManager;


	public function __construct(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}


	public function save(Person $person)
	{
		$this->entityManager->persist($person);
		$this->entityManager->flush();
	}

}
