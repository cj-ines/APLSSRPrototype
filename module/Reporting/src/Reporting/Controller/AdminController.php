<?php
namespace Reporting\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController 
{
	public function indexAction() 
	{
		$view = new ViewModel();
		$user_table_view = new ViewModel();
		$user_table_view->setTemplate('reporting/admin/parts/user-table');
		$view->addChild($user_table_view,'userTable');
		return $view;
	}
}