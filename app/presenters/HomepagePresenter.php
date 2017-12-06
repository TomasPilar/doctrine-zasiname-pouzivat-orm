<?php

namespace App\Presenters;


use App\Entity\Person;
use App\Model\PersonFacade;


class HomepagePresenter extends BasePresenter
{

	/**
	 * @var PersonFacade
	 */
	private $personFacade;


	public function __construct(PersonFacade $personFacade)
	{
		$this->personFacade = $personFacade;
	}


	public function renderDefault()
	{
		// 1) Vytvořit instanci třídy Person
		// 2) Uložit instanci přes Doctrine do databáze
		//$person = $this->personFacade->createPerson('Tomáš', 'Pilař');
		//
		//dump($person);
		//
		// Editace
		//$person->setLastName('Novák');
		//$this->personFacade->rename($person, 'Lukáš', 'Novák');
		//
		//dump($person);
		//
		//$this->personFacade->deletePerson($person);
		//
		//dump($person);
		// Vyhledávání podle ID
		//$person = $this->personFacade->getById(9);
		//dump($person->getFirstName());

		// Vyhledávání přes příjmení
		$persons = $this->personFacade->findByLastName('Pilař');
		dump($persons);
		die;
	}

}
