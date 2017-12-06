<?php

namespace App\Model;

use App\Entity\Project;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;


final class ProjectRepository
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
		$this->repository = $entityManager->getRepository(Project::class);
	}


	/**
	 * @return Project[]
	 */
	public function findAll()
	{
		//return $this->repository->findAll();
		return $this->repository->findBy([], ['name' => 'asc']);
	}

}
