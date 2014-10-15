<?php
namespace Reporting\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController 
{
	protected $data;

	public function indexAction() 
	{

		$upload_form_view = $this->getServiceLocator()->get('UserLoaderFormFactory');
		$create_user_view = $this->getServiceLocator()->get('UserFormFactory');
		$data = $this->getData();
		$view = new ViewModel();
		$pagination_search_view = new ViewModel();
		$pagination_search_view->setTemplate('reporting/admin/parts/pagination-search');
		$user_table_view = new ViewModel(array('data' => $data));
		$user_table_view->setTemplate('reporting/admin/parts/user-table');
		$user_table_view->addChild($pagination_search_view,'paginationSearch');
		$user_table_view->addChild($create_user_view, 'createUserForm');
		$tab_menu_view = new ViewModel();
		$tab_menu_view->setTemplate('reporting/admin/parts/tabs-menu');

		$view->addChild($user_table_view,'userTable')
			->addChild($tab_menu_view,'tabsMenu')
			->addChild($upload_form_view, 'uploadForm')
		;
		return $view;
	}

	public function assignmentAction() 
	{
		$upload_form_view = $this->getServiceLocator()->get('UserLoaderFormFactory');
		$data = $this->getData();
		$view = new ViewModel();
		$pagination_search_view = new ViewModel();
		$pagination_search_view->setTemplate('reporting/admin/parts/pagination-search');
		$assignment_table_view = new ViewModel(array('data' => $data));
		$assignment_table_view->setTemplate('reporting/admin/parts/assignment-table');
		$assignment_table_view->addChild($pagination_search_view,'paginationSearch');
		$tab_menu_view = new ViewModel();
		$tab_menu_view->setTemplate('reporting/admin/parts/tabs-menu');
		$view->addChild($assignment_table_view,'assignmentTable')
			->addChild($tab_menu_view,'tabsMenu')
			->addChild($upload_form_view, 'uploadForm')
		;
		return $view;
	}

	public function fileInvalidAction()
	{
		return new ViewModel();
	}

	public function cyclePeriodAction()
	{
		$view = new ViewModel();
		return $view();
	}

	public function testAction()
	{
		$mailService = $this->getServiceLocator()->get('MailService');
		$mailService->sendSurveyInvitation();
		$mailService->sendCloseNotifications();
		$mailService->sendFinalReminderInvitation();
	}

	public function launchSurveyAction()
	{
		$view = new ViewModel();
		$tab_menu_view = new ViewModel();
		$tab_menu_view->setTemplate('reporting/admin/parts/tabs-menu');
		$view->addChild($tab_menu_view,'tabsMenu');
		return $view;
	}

	public function closeSurveyAction()
	{
		$view = new ViewModel();
		$tab_menu_view = new ViewModel();
		$tab_menu_view->setTemplate('reporting/admin/parts/tabs-menu');
		$view->addChild($tab_menu_view,'tabsMenu');
		return $view;
	}

	public function sendSurveyInvitesAction()
	{
		$mailService = $this->getServiceLocator()->get('MailService');
		$mailService->sendSurveyInvitation();
		$view = new ViewModel();
		return $view;
	}

	public function closeSurveyInvitesAction()
	{
		$mailService = $this->getServiceLocator()->get('MailService');
		$mailService->sendCloseNotifications();
		$view = new ViewModel();
		return $view;
	}

	public function newUserAction()
	{
		$create_user_view = $this->getServiceLocator()->get('UserFormFactory');
		$view = new ViewModel();
		$view->addChild($create_user_view,'createUserForm');
		return $view;
	}

	public function getData() {
        if (!isset($this->data)) {
            $this->data = $this->getServiceLocator()->get('SampleEmployees');
        }
        return $this->data;
    }
}