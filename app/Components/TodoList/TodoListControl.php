<?php

namespace App\Components\TodoList;

use Nette\Application\UI\Control;


class TodoListControl extends Control
{

	public function render()
	{
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}

}
