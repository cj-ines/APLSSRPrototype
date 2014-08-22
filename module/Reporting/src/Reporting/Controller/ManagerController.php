<?php
namespace Reporting\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ManagerController extends AbstractActionController
{
	public function indexAction() 
	{
		$view = new ViewModel();
		return $view;
	}

	public function reviewAssignmentAction()
	{
		$view = new ViewModel();
		return $view;
	}
	
	public function approveAction()
	{
		$view = new ViewModel();
		return $view;
	}
}