<?php

namespace App\Presenters;


use App\Entity\Person;
use App\Model\PersonRepository;


class HomepagePresenter extends BasePresenter
{

	/**
	 * @var PersonRepository
	 */
	private $personRepository;


	public function __construct(PersonRepository $personRepository)
	{
		$this->personRepository = $personRepository;
	}


	public function renderDefault()
	{
		// 1) Vytvořit instanci třídy Person
		// 2) Uložit instanci přes Doctrine do databáze

		$person = new Person('Tomáš', 'Pilař');
		$this->personRepository->save($person);

		die;
	}

}
