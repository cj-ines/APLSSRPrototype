<?php 

namespace Reporting\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\Plugin\Url;
use Zend\View\Model\ViewModel;
use Zend\Mail;

class LoaderController extends AbstractActionController
{
	public function loadUserListAction()
	{
		$user_loader_form = $this->getServiceLocator()->get('UserLoaderForm');	
		$error = null;
		$success = null;
		if ($this->getRequest()->isPost()) {
			$user_loader_form->setData($this->getRequest()->getPost());
			$ext_valid = new \Zend\Validator\File\Extension(array('csv'));
			$file = $this->params()->fromFiles('fileUpload');
			if (!$ext_valid->isValid($file)) {
				//$error = 'INVALID_FILE_EXT';
				$error = $ext_valid->getMessages();
			}
			else {
				$fields_required = array(
					'User ID',
					'First Name',
					'Last Name',
					'Email',
					'Country',
					'Role'
				);
				//$success[] = "File OK";
				$csv = fopen($file['tmp_name'],'r');
				$out = fgetcsv($csv);
				$flag = 0;
				foreach ($out as  $field) {
					if (in_array($field, $fields_required)) {
						$flag++;
					}
					else {
						$unknown[] = $field;
					}
				}

				if ($flag<count($fields_required)) {
					$list = implode(", ", $unknown);
					$error[] = 'Unregnized fields: ' .$list;
					$error[] = 'There are fields that are missing';
				}
				else {
					$success[] = 'List successfully inserted.';
					$this->sendEmail();
				}
			}
		}
		$upload_form_view = new ViewModel(array(
			'userLoaderForm' => $user_loader_form,
			'error' => $error,
			'success' => $success,
		));
		$upload_form_view->setTemplate('reporting/loader/parts/upload-form');
		$view = new ViewModel();
		$view->addChild($upload_form_view,'uploadForm');
		return $view;
	}

	public function processFile($file)
	{

	}

	public function sendEmail()
	{
		$mailer = $this->getServiceLocator()->get('MailService');
		$mailer->sendReviewInvitation();
	}

		
}
