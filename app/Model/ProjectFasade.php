<?php

namespace App\Model;

use App\Entity\Project;


final class ProjectFasade
{

	/**
	 * @var ProjectRepository
	 */
	private $projectRepository;


	public function __construct(ProjectRepository $projectRepository)
	{
		$this->projectRepository = $projectRepository;
	}


	/**
	 * @return Project[]
	 */
	public function findAll()
	{
		return $this->projectRepository->findAll();
	}


	/**
	 * @param $id
	 * @return Project|null
	 */
	public function findById($id)
	{
		return $this->projectRepository->findById($id);
	}

}
