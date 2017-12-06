<?php

namespace App\Model;

use App\Entity\Todo;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;


class TodoRepository
{

	/**
	 * @var EntityManager
	 */
	private $entityManager;

	/**
	 * @var ObjectRepository
	 */
	private $repository;


	public function __construct(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
		$this->repository = $entityManager->getRepository(Todo::class);
	}


	public function save(Todo $todo)
	{
		$this->entityManager->persist($todo);
		$this->entityManager->flush();
	}


	public function findAll()
	{
		return $this->repository->findAll();
	}


	public function findById($id)
	{
		return $this->repository->find($id);
	}


	public function remove(Todo $todo)
	{
		$this->entityManager->remove($todo);
		$this->entityManager->flush();
	}

}
