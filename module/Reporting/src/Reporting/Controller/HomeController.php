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
}