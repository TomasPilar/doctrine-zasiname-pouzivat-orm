<?php

namespace App\Model;

use App\Entity\Todo;
use Doctrine\ORM\EntityManager;


class TodoRepository
{

	/**
	 * @var EntityManager
	 */
	private $entityManager;


	public function __construct(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}


	public function save(Todo $todo)
	{
		$this->entityManager->persist($todo);
		$this->entityManager->flush();
	}

}
