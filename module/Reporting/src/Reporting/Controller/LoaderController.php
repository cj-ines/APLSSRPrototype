<?php 

namespace Reporting\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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
				$fields_required = array('User Number','First Name','Last Name','Email');
				$success[] = "File OK";
				$csv = fopen($file['tmp_name'],'r');
				$out = fgetcsv($csv);
				$flag = false;
				foreach ($out as  $field) {
					if (in_array($field, $fields_required)) {
						$flag = true;
					}
					else {
						$missing[] = $field;
					}
				}

				if (!$flag) {
					$list = implode(", ", $missing);
					$success[] = 'There are fields that are missing';
				}
				else {
					$success[] = 'List successfully inserted.';
				}
			}
		}
		$view = new ViewModel(array(
			'userLoaderForm' => $user_loader_form,
			'error' => $error,
			'success' => $success,
		));
		return $view;
	}
		
}
