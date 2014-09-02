<?php
namespace Reporting\Form;

use Zend\InputFilter\InputFilter;

class ContactUsFilter extends InputFilter
{
	public function __construct()
	{
		$this->add(array(
			'name' => 'name',
			'required'=> true,
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array('min' => 3, 'max' => 50),
				),
			),
		));
	}
}