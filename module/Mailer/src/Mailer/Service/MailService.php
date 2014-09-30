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
		$emails =  $config['email_config']['email_address'];
		return explode(",", $emails);
	}

	public function sendReviewInvitation()
	{
		$mailer = $this->getMailerService();
		$mail = new Mail\Message();
		$module_config = $this->getModuleConfig();
		
		$body = "Dear Manager, Please review you respondents: " . $module_config['review_respondent_link'];
		$mail->setBody($body);
		$mail->setSubject('Manager Invitation');
		$mail->setFrom($module_config['sender']);
		$mail->setTo($this->getEmailCopy() );
		$mailer->send($mail);
	}

	public function sendSurveyInvitation()
	{
		$mailer = $this->getMailerService();
		$module_config = $this->getModuleConfig();
		$mail = new Mail\Message();
		$body = "Dear Respondent, Please complete the survey: " . $module_config['survey_link'];
		$body = "
Dear [Reviewer Name],

The annual SSR performance review process has commenced and you are receiving this email as you have been assigned to participate in rating [SSR Name] as part of their performance review.

Please click on the link below for the questionnaire.  

If you received this email in error and should not be reviewing [SSR Name], please inform your Manager immediately so changes can be made promptly.

Survey ends [date].

".$module_config['survey_link']."

Regards,
APL team in charge of ISQ system

***This is a system generated email, please do not reply as it will not reach an APL mailbox.***
";
		$mail->setSubject('Survey Invitation');
		$mail->setBody($body);
		$mail->setFrom($module_config['sender']);
		$mail->setTo($this->getEmailCopy() );
		$mailer->send($mail);
	}

	public function sendReminderInvitationSSR()
	{
		$mailer = $this->getMailerService();
		$module_config = $this->getModuleConfig();
		$mail = new Mail\Message();
		$body = "
The annual SSR performance review process has commenced and you are receiving this email to notify you of the Reviewers that have been assigned to rate your performance:
 
1. Alvin Lopez
2. Sophia Yue
3. Pallab Chakrabarti

Please make sure that all Reviewers are correct and contact your Manager immediately if changes are required.  

You will be notified if assigned Reviewers have answered the survey.

Survey ends [date].

Regards,
APL team in charge of ISQ system

***This is a system generated email, please do not reply as it will not reach an APL mailbox.***
";
		$mail->setSubject('Reviewer Changed');
		$mail->setBody($body);
		$mail->setFrom($module_config['sender']);
		$mail->setTo($this->getEmailCopy() );
		$mailer->send($mail);
	}

	public function sendReviewerChanged()
	{
		$mailer = $this->getMailerService();
		$module_config = $this->getModuleConfig();
		$mail = new Mail\Message();
		$body = "
Dear [SSR Name],

This is to notify you that Reviewer [Reviewer name] has been un-assigned/ assigned to you.

Regards,
APL team in charge of ISQ system

***This is a system generated email, please do not reply as it will not reach an APL mailbox.***

";
		$mail->setSubject('Reviewer Changed');
		$mail->setBody($body);
		$mail->setFrom($module_config['sender']);
		$mail->setTo($this->getEmailCopy() );
		$mailer->send($mail);


		$mail = new Mail\Message();
		$body = "
Dear [Reviewer Name],
 
This is to notify you that you will no longer be assigned to carry out the SSR survey for [SSR name].

Regards,
APL team in charge of ISQ system
 
***This is a system generated email, please do not reply as it will not reach an APL mailbox.***

";
		$mail->setSubject('Reviewer Changed');
		$mail->setBody($body);
		$mail->setFrom($module_config['sender']);
		$mail->setTo($this->getEmailCopy() );
		$mailer->send($mail);

		$mail = new Mail\Message();
		$body = "
Dear Manager/ Admin,

This is to notify you that Reviewer: [reviewer name] has been successfully un-assigned/ assigned for SSR: [SSR name].
Regards,
APL team in charge of ISQ system

***This is a system generated email, please do not reply as it will not reach an APL mailbox.***
";
		$mail->setSubject('Reviewer Changed');
		$mail->setBody($body);
		$mail->setFrom($module_config['sender']);
		$mail->setTo($this->getEmailCopy() );
		$mailer->send($mail);
	}

	public function sendCloseNotifications()
	{
		$mailer = $this->getMailerService();
		$module_config = $this->getModuleConfig();
		$mail = new Mail\Message();
		$body = "
Dear SSR Name,

This is to notify you the SSR performance review system has been closed. You may enter to view your aggregated score through following link:

http://". $_SERVER['SERVER_NAME']."/dashboard

Regards,
APL team in charge of ISQ system

***This is a system generated email, please do not reply as it will not reach an APL mailbox.***

";
		$mail->setSubject('System Closed');
		$mail->setBody($body);
		$mail->setFrom($module_config['sender']);
		$mail->setTo($this->getEmailCopy() );
		$mailer->send($mail);

		$mail = new Mail\Message();
		$body = "
Dear MGR Name,

The review process has concluded and the final scores are now available.  Please log in to review report.

http://". $_SERVER['SERVER_NAME']."/dashboard

Regards,
APL team in charge of ISQ system

***This is a system generated email, please do not reply as it will not reach an APL mailbox.***

";
		$mail->setSubject('System Closed');
		$mail->setBody($body);
		$mail->setFrom($module_config['sender']);
		$mail->setTo($this->getEmailCopy() );
		$mailer->send($mail);
	}

	

	public function sendCompleted()
	{
		$mailer = $this->getMailerService();
		$mail = new Mail\Message();
		$module_config = $this->getModuleConfig();
		
		$body = "
Dear SSR Name,

This is to notify you that [Reviewer name] has completed SSR survey for you.

Regards,
APL team in charge of ISQ system

***This is a system generated email, please do not reply as it will not reach an APL mailbox.***";
		$mail->setBody($body);
		$mail->setSubject('Manager Invitation');
		$mail->setFrom($module_config['sender']);
		$mail->setTo($this->getEmailCopy() );
		$mailer->send($mail);
	}

	public function sendFinalReminderInvitation()
	{
		$mailer = $this->getMailerService();
		$module_config = $this->getModuleConfig();
		$mail = new Mail\Message();
		
		$body = "
Dear [SSR Name],

Please note that the SSR survey is pending the following Reviewers completion:

1. xxx
2. yyy
3. zzz

Survey ends [date].

Regards,
APL team in charge of ISQ system

***This is a system generated email, please do not reply as it will not reach an APL mailbox.***";
		$mail->setSubject('Survey Reminder');
		$mail->setBody($body);
		$mail->setFrom($module_config['sender']);
		$mail->setTo($this->getEmailCopy() );
		$mailer->send($mail);

		$body = "
Dear [Reviewer Name],

Please note that there is a SSR survey for [SSR name] pending your completion.

Please click on the link below for the questionnaire.  

Survey ends [date].

".$module_config['survey_link']."

If you received this email in error and should not be reviewing [SSR Name], please inform your Manager immediately so changes can be made.

Regards,
APL team in charge of ISQ system

***This is a system generated email, please do not reply as it will not reach an APL mailbox.***
";
		$mail->setSubject('Survey Reminder');
		$mail->setBody($body);
		$mail->setFrom($module_config['sender']);
		$mail->setTo($this->getEmailCopy() );
		$mailer->send($mail);
	}

	public function sendReminderInvitation()
	{
		$mailer = $this->getMailerService();
		$module_config = $this->getModuleConfig();
		$mail = new Mail\Message();
		$body = "Dear Respondent, This is just a reminder to commplete the survey: " . $module_config['survey_link'];
		$mail->setSubject('Survey Reminder');
		$mail->setBody($body);
		$mail->setFrom($module_config['sender']);
		$mail->setTo($this->getEmailCopy() );
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