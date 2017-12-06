<?php

namespace App\Model;

use App\Entity\Person;
use App\Exception\PersonEntityNotFoundException;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;


final class PersonRepository
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
		$this->repository = $entityManager->getRepository(Person::class);
	}


	public function save(Person $person)
	{
		$this->entityManager->persist($person);
		$this->entityManager->flush();
	}


	public function delete(Person $person)
	{
		$this->entityManager->remove($person);
		$this->entityManager->flush();
	}


	/**
	 * @param $id
	 * @return null|Person
	 */
	public function findById($id)
	{
		return $this->repository->find($id);
	}


	/**
	 * @param $id
	 * @return Person
	 * @throws PersonEntityNotFoundException
	 */
	public function getById($id)
	{
		$person = $this->findById($id);

		if ( ! $person) {
			throw new PersonEntityNotFoundException;
		}

		return $person;
	}


	public function findByLastName($lastName)
	{
		//return $this->repository->findOneBy(['lastName' => $lastName]);
		return $this->repository->findBy(['lastName' => $lastName], ['id' => 'desc'], 3);
	}


	/**
	 * @return Person[]
	 */
	public function findAll()
	{
		//return $this->repository->findAll();
		return $this->repository->findBy([], ['id' => 'asc']);
	}

}
