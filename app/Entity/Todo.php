<?php

namespace App\Entity;

use App\Entity\Traits\IdentifierTrait;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="todo")
 */
class Todo
{

	use IdentifierTrait;

	/**
	 * @ORM\Column(type="text")
	 * @var string
	 */
	private $message;

	/**
	 * @ORM\Column(type="boolean", options={"default": FALSE})
	 * @var bool
	 */
	private $isDone = FALSE;


	/**
	 * @param string $message
	 * @param bool $isDone
	 */
	public function __construct($message, $isDone)
	{
		$this->message = $message;
		$this->isDone = $isDone;
	}


	/**
	 * @return string
	 */
	public function getMessage()
	{
		return $this->message;
	}


	/**
	 * @param string $message
	 */
	public function setMessage($message)
	{
		$this->message = $message;
	}


	/**
	 * @return bool
	 */
	public function isDone()
	{
		return $this->isDone;
	}


	/**
	 * @param bool $isDone
	 */
	public function setIsDone($isDone)
	{
		$this->isDone = $isDone;
	}

}
