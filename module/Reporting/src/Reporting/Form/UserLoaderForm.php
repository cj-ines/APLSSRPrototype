<?php 
namespace Reporting\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class UserLoaderForm extends Form
{
	public function __construct($name = null) 
	{
		parent::__construct('UserLoaderForm');

		$this->setName('UserLoader');
		$this->setAttribute('method','post');
		$this->setAttribute('enctype','multipart/form-data');

		$this->add(array(
			'name' => 'fileUpload',
			'type' => 'Zend\Form\Element\File',
			'attributes'=> array (
				'type' => 'file',
			),
			'options' => array (
				'label' => 'Userlist upload',
			)
		));
		$this->add(array(
			'name' => 'testText',
			'type' => 'Text',
			'options' => array(
				'label' => 'test Text',
				'required' => 'required',
			),
		));
		$this->add(array(
			'name' => 'fileSubmit',
			'type' => 'Zend\Form\Element\Submit',
			'attributes' => array(
				'value' => 'Upload List',
			),
		));
	}
}