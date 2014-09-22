<?php
namespace User\Form; 

use Zend\Captcha; 
use Zend\Form\Element; 
use Zend\Form\Form; 

class UserForm extends Form 
{ 
    public function __construct($name = null) 
    { 
        parent::__construct('user\form'); 
        
        $this->setAttribute('method', 'post'); 
        $this->setAttribute('method','post');
		$this->setAttributes(array(
			'class' => 'form-horizontal',
			'role' => 'form',
		));
        
        $this->add(array( 
            'name' => 'Role', 
            'type' => 'Zend\Form\Element\Select', 
            'attributes' => array( 
                'class' => 'form-control', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Role', 
                'value_options' => array(
                    '0' => 'ESR / Sales Rep',  
                    '2' => 'Admin', 
                    '3' => 'Manager', 
                ),
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'firsName', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'class' => 'form-control', 
                'placeholder' => 'First Name', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'First Name', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'lastName', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'class' => 'form-control', 
                'placeholder' => 'Last Name', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Last Name', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'emailAddress', 
            'type' => 'Zend\Form\Element\Email', 
            'attributes' => array( 
                'class' => 'form-control', 
                'placeholder' => 'Email Address', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Email', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'country', 
            'type' => 'Zend\Form\Element\Select', 
            'attributes' => array( 
                'class' => 'form-control', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Country', 
                'value_options' => array(
                    '0' => 'USA', 
                    '1' => 'China', 
                ),
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'csrf', 
            'type' => 'Zend\Form\Element\Csrf', 
        ));
        $this->add(array(
			'name' => 'submitForm',
			'type' => 'Zend\Form\Element\Submit',
			'attributes' => array(
				'value' => 'Save',
				'class' => 'btn btn-primary'
			)
		));   
    } 
} 