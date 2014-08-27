<?php
namespace Reporting\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController 
{
	public function indexAction() 
	{

		
		$view = new ViewModel();
		$pagination_search_view = new ViewModel();
		$pagination_search_view->setTemplate('reporting/admin/parts/pagination-search');
		$user_table_view = new ViewModel();
		$user_table_view->setTemplate('reporting/admin/parts/user-table');
		$user_table_view->addChild($pagination_search_view,'paginationSearch');
		$tab_menu_view = new ViewModel();
		$tab_menu_view->setTemplate('reporting/admin/parts/tabs-menu');
		$view->addChild($user_table_view,'userTable')
			->addChild($tab_menu_view,'tabsMenu')
		;
		return $view;
	}

	public function assignmentAction() 
	{
		
		$upload_form = $this->getServiceLocator()->get('UserLoaderForm');
		$view = new ViewModel();
		$pagination_search_view = new ViewModel();
		$pagination_search_view->setTemplate('reporting/admin/parts/pagination-search');
		$upload_assignments_view = new ViewModel();
		$upload_assignments_view->setTemplate('reporting/admin/parts/upload-assignments');
		$assignment_table_view = new ViewModel();
		$assignment_table_view->setTemplate('reporting/admin/parts/assignment-table');
		$assignment_table_view->addChild($pagination_search_view,'paginationSearch');
		$tab_menu_view = new ViewModel();
		$tab_menu_view->setTemplate('reporting/admin/parts/tabs-menu');
		$view->addChild($upload_assignments_view,'uploadAssigments')
			->addChild($tab_menu_view,'tabsMenu')
			->addChild($assignment_table_view,'assignmentTable')
		;
		return $view;
	}

	public function fileInvalidAction()
	{
		return new ViewModel();
	}
}