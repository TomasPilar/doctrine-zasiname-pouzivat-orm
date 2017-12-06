<?php

namespace App\Components\TodoList;

use App\Model\TodoFacade;
use Nette\Application\UI\Control;


class TodoListControl extends Control
{

	/**
	 * @var TodoFacade
	 */
	private $todoFacade;


	public function __construct(TodoFacade $todoFacade)
	{
		$this->todoFacade = $todoFacade;
	}


	public function handleDelete(int $todoId)
	{
		$todo = $this->todoFacade->findById($todoId);
		$this->todoFacade->deleteTodo($todo);

		$this->redirect('this');
	}


	public function render()
	{
		$this->template->setFile(__DIR__ . '/templates/default.latte');

		$this->template->setParameters([
			'todos' => $this->todoFacade->findAll()
		]);

		$this->template->render();
	}

}
