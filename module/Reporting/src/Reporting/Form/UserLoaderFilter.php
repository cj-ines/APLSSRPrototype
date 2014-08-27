<?php
namespace Reporting\Form;

use Zend\InputFilter\InputFilter;

class UserLoaderFilter extends InputFilter
{
	public function __construct()
	{
		/* $this->add(array(
			'name' => 'fileUpload',
			'required' => true,
			'validators' => array(
				array (
					'name' => 'Zend\Validator\File\Extension',
					'options' => array('csv')
				),
			),
		)); */

		$this->add(array(
			'name' => 'testText',
			'required' => false,
			'validators' => array(
				array (
					'name' => 'StringLength',
					'options' => array('min' => 2),
				),
			),
		));
	}
}