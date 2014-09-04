<?php
namespace Reporting\Form;

use Zend\InputFilter\InputFilter;

class ContactUsFilter extends InputFilter
{
	public function __construct()
	{
		
		$this->add(array(
			'name' => 'subject',
			'required'=> 'required',
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array('min' => 3, 'max' => 50),
				),
			),
		));

		$this->add(array(
			'name' => 'customerName',
			'required'=> 'required',
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array('min' => 3, 'max' => 50),
				),
			),
		));

		$this->add(array(
			'name' => 'emailAddress',
			'required'=> 'required',
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array('min' => 3, 'max' => 50),
				),
				array(
					'name' => 'EmailAddress',
				),
			),
		));

		$this->add(array(
			'name' => 'messageBody',
			'required'=> 'required',
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array('min' => 3, 'max' => 200),
				),
			),
		));
	}
}