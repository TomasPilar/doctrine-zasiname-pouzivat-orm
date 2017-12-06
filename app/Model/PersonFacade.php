<?php

namespace App\Model;

use App\Entity\Person;


final class PersonFacade
{

	/**
	 * @var PersonRepository
	 */
	private $personRepository;


	public function __construct(PersonRepository $personRepository)
	{
		$this->personRepository = $personRepository;
	}


	/**
	 * @param $firstName
	 * @param $lastName
	 * @return Person
	 */
	public function createPerson($firstName, $lastName)
	{
		$person = new Person($firstName, $lastName);
		$this->personRepository->save($person);

		// odeslání emailu, sms...

		return $person;
	}

}
