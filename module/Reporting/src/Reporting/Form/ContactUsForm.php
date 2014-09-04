<?php 
namespace Reporting\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class ContactUsForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('ContactUsForm');

		$this->setName('ContactUs');
		$this->setAttribute('method','post');
		$this->setAttributes(array(
			'class' => 'form-horizontal',
			'role' => 'form',
		));

		$this->add(array(
			'name' => 'subject',
			'type' => 'Text',
			'options' => array(
				'label' => 'Subject ',
				'required' => 'required',
			),
			'attributes' => array(
				'placeholder' => 'Enter subject',
				'id' => 'subject',
				'class' => 'form-control'
			),
		));

		$this->add(array(
			'name' => 'customerName',
			'type' => 'Text',
			'options' => array(
				'label' => 'Name ',
				'required' => 'required',
			),
			'attributes' => array(
				'placeholder' => 'Eneter your name',
				'id' => 'name',
				'class' => 'form-control'
			),
		));

		$this->add(array(
			'name' => 'emailAddress',
			'type' => 'Text',
			'options' => array(
				'label' => 'Email Address ',
				'required' => 'required',
			),
			'attributes' => array(
				'placeholder' => 'Eneter your e-mail',
				'id' => 'email',
				'class' => 'form-control'
			),
		));

		$this->add(array(
			'name' => 'messageBody',
			'type' => 'Zend\Form\Element\Textarea',
			'options' => array(
				'label' => 'Body',
				'required'=> 'required',
			),
			'attributes' => array(
				'class' => 'form-control',
				'placeholder' => 'Enter comments, problems, suggestions. Max of 200 characters.',
				'id' => 'body',
				'rows' => '4',
			)
		));
		
		$this->add(array(
			'name' => 'submitForm',
			'type' => 'Zend\Form\Element\Submit',
			'attributes' => array(
				'value' => 'Send Message',
				'class' => 'btn btn-primary'
			)
		));
	}
}