<?php

namespace App\Model;

use App\Entity\Person;
use App\Exception\PersonEntityNotFoundException;


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


	public function rename(Person $person, $firstName, $lastName)
	{
		$person->setFirstName($firstName);
		$person->setLastName($lastName);

		$this->personRepository->save($person);
	}


	public function deletePerson(Person $person)
	{
		$this->personRepository->delete($person);
	}


	/**
	 * @param $id
	 * @return Person|null
	 */
	public function findById($id)
	{
		return $this->personRepository->findById($id);
	}


	/**
	 * @param $id
	 * @return Person
	 * @throws PersonEntityNotFoundException
	 */
	public function getById($id)
	{
		return $this->personRepository->getById($id);
	}


	public function findByLastName($lastName)
	{
		return $this->personRepository->findByLastName($lastName);
	}


	/**
	 * @return Person[]
	 */
	public function findAll()
	{
		return $this->personRepository->findAll();
	}

}
