<?php 
namespace Mailer\Service;

use Zend\Mail;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

class MailService implements ServiceLocatorAwareInterface
{
	protected $mailer;
	protected $sm;

	public function getMailerService()
	{
		if (!$this->mailer) {
			$this->mailer = $this->getServiceLocator()->get('MailerService');
		}

		return $mailer;
	}

	public function getEmailCopy()
	{
		$config = $this->getServiceLocator()->get('Config');
		return $config['email_config']['email_address'];
	}

	public function sendReviewInvitation()
	{
		$mailer = $this->getMailerService();
		$mail = new Mail\Message();
		$link = 'http://'. $_SERVER['SERVER_NAME'].$this->url()->fromRoute('reporting/manager-interface', array('action' => 'review-assignment'));
		var_dump($link);
		$body = "Dear Manager, Please review you responents: " . $link ;
		$mail->setBody($body);
		$mail->setSubject('SSR Invitation');
		$mail->setFrom('SSR.Survey@email.com');
		$mail->setTo($this->getEmailCopy());
		$mailer->send($mail);
	}

	public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
	{
		$this->sm = $serviceLocator;
	}

	public function getServiceLocator()
	{
		return $this->sm;
	}
}