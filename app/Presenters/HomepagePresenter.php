<?php

namespace App\Presenters;

use App\Components\TodoForm\TodoFormControl;
use App\Components\TodoForm\TodoFormControlFactoryInterface;
use App\Components\TodoList\TodoListControl;
use App\Components\TodoList\TodoListControlFactoryInterface;


class HomepagePresenter extends BasePresenter
{

	/**
	 * @var TodoFormControlFactoryInterface
	 */
	private $todoFormControlFactory;

	/**
	 * @var TodoListControlFactoryInterface
	 */
	private $todoListControlFactory;


	public function __construct(
		TodoFormControlFactoryInterface $todoFormControlFactory,
		TodoListControlFactoryInterface $todoListControlFactory
	) {
		$this->todoFormControlFactory = $todoFormControlFactory;
		$this->todoListControlFactory = $todoListControlFactory;
	}


	public function renderDefault()
	{

	}


	/**
	 * @return TodoFormControl
	 */
	public function createComponentTodoForm()
	{
		return $this->todoFormControlFactory->create();
	}


	/**
	 * @return TodoListControl
	 */
	public function createComponentTodoList()
	{
		return $this->todoListControlFactory->create();
	}

}
