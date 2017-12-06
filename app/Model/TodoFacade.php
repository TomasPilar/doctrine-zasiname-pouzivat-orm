<?php

namespace App\Model;

use App\Entity\Person;
use App\Entity\Project;
use App\Entity\Todo;


class TodoFacade
{

	/**
	 * @var TodoRepository
	 */
	private $todoRepository;

	/**
	 * @var PersonRepository
	 */
	private $personRepository;


	public function __construct(
		TodoRepository $todoRepository,
		PersonRepository $personRepository
	) {
		$this->todoRepository = $todoRepository;
		$this->personRepository = $personRepository;
	}


	public function createTodo($message, Project $project, Person $person)
	{
		$todo = new Todo($message, FALSE);
		$todo->setProject($project);

		$this->todoRepository->save($todo);

		//$project->addPerson($person);
		$person->addProject($project);
		$this->personRepository->save($person);

		return $todo;
	}


	public function findAll()
	{
		return $this->todoRepository->findAll();
	}


	public function findById($id)
	{
		return $this->todoRepository->findById($id);
	}


	public function deleteTodo(Todo $todo)
	{
		$this->todoRepository->remove($todo);
	}
	
}
