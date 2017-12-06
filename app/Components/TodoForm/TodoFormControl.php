<?php

namespace App\Components\TodoForm;

use App\Forms\FormFactory;
use App\Model\PersonFacade;
use App\Model\ProjectFasade;
use App\Model\TodoFacade;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;


class TodoFormControl extends Control
{

	/**
	 * @var FormFactory
	 */
	private $formFactory;

	/**
	 * @var ProjectFasade
	 */
	private $projectFasade;

	/**
	 * @var PersonFacade
	 */
	private $personFacade;

	/**
	 * @var TodoFacade
	 */
	private $todoFacade;


	public function __construct(
		FormFactory $formFactory,
		ProjectFasade $projectFasade,
		PersonFacade $personFacade,
		TodoFacade $todoFacade
	){
		$this->formFactory = $formFactory;
		$this->projectFasade = $projectFasade;
		$this->personFacade = $personFacade;
		$this->todoFacade = $todoFacade;
	}


	public function render()
	{
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}


	/**
	 * @return Form
	 */
	public function createComponentForm()
	{
		$form = $this->formFactory->create();
		
		$form->addSelect('project', 'Projekt', $this->getProjectPairs());
		$form->addSelect('person', 'Osoba', $this->getPersonPairs());
		$form->addTextArea('message', 'Úkol');
		$form->addSubmit('send', 'Vytvořit');
		
		$form->onSuccess[] = [$this, 'process'];
		
		return $form;
	}


	public function process(Form $form, array $values)
	{
		$project = $this->projectFasade->findById($values['project']);
		$person = $this->personFacade->findById($values['person']);

		$todo = $this->todoFacade->createTodo($values['message'], $project, $person);

		$this->redirect('this');
	}


	/**
	 * @return array
	 */
	private function getProjectPairs()
	{
		$projects = [];
		foreach ($this->projectFasade->findAll() as $project) {
			$projects[$project->getId()] = $project->getName();
		}

		return $projects;
	}


	/**
	 * @return string
	 */
	private function getPersonPairs()
	{
	    $persons = [];
		foreach ($this->personFacade->findAll() as $person) {
			$persons[$person->getId()] = $person->getName();
		}

		return $persons;
	}

}
