<?php

namespace App\Components\TodoForm;

interface TodoFormControlFactoryInterface
{

	/**
	 * @return TodoFormControl
	 */
	function create();

}
