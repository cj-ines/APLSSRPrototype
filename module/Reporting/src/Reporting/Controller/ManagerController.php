<?php
namespace Reporting\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ManagerController extends AbstractActionController
{
	public function indexAction() 
	{
		$mailer = $this->getServiceLocator()->get('MailService');
		$mailer->sendReviewInvitation();
		$mailer->sendSurveyInvitation();
		$view = new ViewModel();
		return $view;
	}

	public function reviewAssignmentAction()
	{
		$review_table_view = new ViewModel();
		$review_table_view->setTemplate('reporting/manager/parts/review-table');
		$assignment_table = new ViewModel();
		$assignment_table->setTemplate('reporting/manager/parts/assignments');
		$view = new ViewModel();
		$view->addChild($review_table_view,'reviewTable')->addChild($assignment_table,'assignment');
		return $view;
	}
	
	public function approveAction()
	{
		$mailer =  $this->getServiceLocator()->get('MailService');
		$mailer->sendSurveyInvitation();
		$view = new ViewModel();
		return $view;
	}
}