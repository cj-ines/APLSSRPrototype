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
		$data[] = array(
			'first_name' => 'John',
			'last_name' => 'Doe',
			'role' => 'SSR / Trade Analyst',
			'status' => 'no',
			'country' => 'USA',
			'reviewers' => array(
				array(
					'first_name' => 'Gary',
					'last_name' => 'Oak',
					'country' => 'USA',
					'email' => 'gary.oak@email.com',
					'role' => 'ESR',
					'status' => 'yes'
				),
				array(
					'first_name' => 'Horihito',
					'last_name' => 'Kazuma',
					'country' => 'USA',
					'email' => 'hkazuma@email.com',
					'role' => 'ESR',
					'status' => 'no'
				),
				array(
					'first_name' => 'Juddie',
					'last_name' => 'Abbot',
					'country' => 'USA',
					'email' => 'judabbot@email.com',
					'role' => 'ESR',
					'status' => 'no'
				),
			),
		);

		$data[] = array(
			'first_name' => 'Diana Rose',
			'last_name' => 'Stalone',
			'role' => 'SSR / Trade Analyst',
			'country' => 'USA',
			'status' => 'no',
			'reviewers' => array(
				array(
					'first_name' => 'John',
					'last_name' => 'Presley',
					'country' => 'USA',
					'email' => 'johnp@email.com',
					'role' => 'ESR',
					'status' => 'no'
				),
				array(
					'first_name' => 'Markus',
					'last_name' => 'Camby',
					'country' => 'USA',
					'email' => 'mcmc@email.com',
					'role' => 'ESR',
					'status' => 'yes'
				),
				array(
					'first_name' => 'Kolehai',
					'last_name' => 'Haineko',
					'country' => 'USA',
					'email' => 'khaineko@email.com',
					'role' => 'ESR',
					'status' => 'no'
				),
			),
		);

		$data[] = array(
			'first_name' => 'Cristopher',
			'last_name' => 'Dela Mortiz',
			'role' => 'SSR / Trade Analyst',
			'country' => 'USA',
			'status' => 'yes',
		);

		$review_table_view = new ViewModel(array('data' => $data));
		$review_table_view->setTemplate('reporting/manager/parts/review-table');
		
		$assignment_table = new ViewModel(array('data' => $data[0]));
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