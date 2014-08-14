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
		$tab_menu_view = new ViewModel();
		$tab_menu_view->setTemplate('reporting/admin/parts/tabs-menu');
		$view->addChild($user_table_view,'userTable')->addChild($tab_menu_view,'tabsMenu');
		return $view;
	}

	public function assignmentAction() 
	{
		$view = new ViewModel();
		$upload_assignments_view = new ViewModel();
		$upload_assignments_view->setTemplate('reporting/admin/parts/upload-assignments');
		$tab_menu_view = new ViewModel();
		$tab_menu_view->setTemplate('reporting/admin/parts/tabs-menu');
		$view->addChild($upload_assignments_view,'uploadAssigments')->addChild($tab_menu_view,'tabsMenu');
		return $view;
	}
}