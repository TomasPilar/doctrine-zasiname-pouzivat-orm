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

		$person = $this->personFacade->createPerson('Tomáš', 'Pilař');

		dump($person);

		die;
	}

}
