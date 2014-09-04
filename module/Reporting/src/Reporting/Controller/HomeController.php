<?php

namespace Reporting\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mail;

class HomeController extends AbstractActionController
{
	public $contact_us_form;
	public $mailer;

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
		$form = $this->getContactUsForm();
		$view = new ViewModel(array('form' => $form));
		return $view;
	}

	public function sendMessageAction()
	{
		if (!$this->getRequest()->isPost()) {
			$this->redirect()->toRoute('reporting/site-pages', array('action' => 'contact-us'));
		}
		$form = $this->getContactUsForm();
		$post = $this->getRequest()->getPost();
		$form->setData($post);
		if (!$form->isValid()) {
			//$this->redirect()->toRoute('reporting/site-pages', array('action' => 'contact-us'), array('form' => $form));
			$view = new ViewModel(array('form' => $form));
			$view->setTemplate('reporting/home/contact-us');
			return $view;
		}
		else {
			$mail = new Mail\Message();
			$mail->addFrom($post->emailAddress);
			$mail->addTo('kaisercj@live.com');
			$mail->setSubject($post->subject);
			$mail->setBody($post->messageBody);
			$mailer = $this->getMailerService();
			$mailer->send($mail);
			$view = new ViewModel();
			$view->setTemplate('reporting/home/send-success');
			return $view;
		}
	}

	public function getContactUsForm()
	{
		if (!isset($this->contact_us_form)) {
			$this->contact_us_form = $this->getServiceLocator()->get('ContactUsForm');
		}
		return $this->contact_us_form;
		
	}

	public function getMailerService()
	{
		if (!isset($this->mailer)) {
			$this->mailer = $this->getServiceLocator()->get('MailerService');
		}
		return $this->mailer;
	}

}