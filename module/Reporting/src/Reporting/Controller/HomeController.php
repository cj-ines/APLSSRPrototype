<?php

namespace Reporting\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class HomeController extends AbstractActionController
{
	public function indexAction()
	{
		$view = new ViewModel();
		return $view;
	}

	public function viewWorkflowAction()
	{
		$view = new ViewModel();
		return $view;
	}

	public function contactUsAction()
	{
		$form = $this->getServiceLocator()->get('ContactUsForm');
		$view = new ViewModel(array('form' => $form));
		return $view;
	}
}