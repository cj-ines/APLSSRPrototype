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

		return $this->mailer;
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
		$module_config = $this->getModuleConfig();
		
		$body = "Dear Manager, Please review you responents: " . $module_config['review_respondent_link'];
		$mail->setBody($body);
		$mail->setSubject('SSR Invitation');
		$mail->setFrom($module_config['sender']);
		$mail->setTo($this->getEmailCopy());
		$mailer->send($mail);
	}

	public function sendSurveyInvitation()
	{
		$mailer = $this->getMailerService();
		$module_config = $this->getModuleConfig();
		$mail = new Mail\Message();
		$body = "Dear Respondent, Please complete the survey: " . $module_config['survey_link'];
		$mail->setSubject('Survey Invitation');
		$mail->setBody($body);
		$mail->setFrom($module_config['sender']);
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

	public function getModuleConfig()
	{
		$config = $this->getServiceLocator()->get('config');
		return $config['module_config'];
	}
}