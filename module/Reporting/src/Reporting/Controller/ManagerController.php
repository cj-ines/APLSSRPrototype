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
		$view = new ViewModel();
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