<?php
namespace User\Form; 

use Zend\InputFilter\Factory as InputFactory; 
use Zend\InputFilter\InputFilter; 
use Zend\InputFilter\InputFilterAwareInterface; 
use Zend\InputFilter\InputFilterInterface; 

class UserFormValidator implements InputFilterAwareInterface 
{ 
    protected $inputFilter; 
    
    public function setInputFilter(InputFilterInterface $inputFilter) 
    { 
        throw new \Exception("Not used"); 
    } 
    
    public function getInputFilter() 
    { 
        if (!$this->inputFilter) 
        { 
            $inputFilter = new InputFilter(); 
            $factory = new InputFactory(); 
            
        
        $inputFilter->add($factory->createInput([ 
            'name' => 'Role', 
            'filters' => array( 
                array('name' => 'StripTags'), 
                array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
                array ( 
                    'name' => 'InArray', 
                    'options' => array( 
                            'haystack' => array(0,1,2,3) 
                        'messages' => array(, 
                            'notInArray' => 'undefined' 
                        ), 
                    ), 
                ), 

            ), 
        ])); 
 
        $inputFilter->add($factory->createInput([ 
            'name' => 'firsName', 
            'required' => true, 
            'filters' => array( 
                array('name' => 'StripTags'), 
                array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
                array ( 
                    'name' => 'StringLength', 
                    'options' => array( 
                        'encoding' => 'UTF-8', 
                        'min' => '3', 
                        'max' => '40', 
                    ), 
                ), 
            ), 
        ])); 
 
        $inputFilter->add($factory->createInput([ 
            'name' => 'lastName', 
            'required' => true, 
            'filters' => array( 
                array('name' => 'StripTags'), 
                array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
                array ( 
                    'name' => 'StringLength', 
                    'options' => array( 
                        'encoding' => 'UTF-8', 
                        'min' => '3', 
                        'max' => '40', 
                    ), 
                ), 
            ), 
        ])); 
 
        $inputFilter->add($factory->createInput([ 
            'name' => 'emailAddress', 
            'filters' => array( 
                array('name' => 'StripTags'), 
                array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
                array ( 
                    'name' => 'StringLength', 
                    'options' => array( 
                        'encoding' => 'UTF-8', 
                        'min' => '4', 
                        'max' => '40', 
                    ), 
                ), 
                array ( 
                    'name' => 'EmailAddress', 
                    'options' => array( 
                        'messages' => array( 
                            'emailAddressInvalidFormat' => 'Email address format is not invalid', 
                        ) 
                    ), 
                ), 
                array ( 
                    'name' => 'NotEmpty', 
                    'options' => array( 
                        'messages' => array( 
                            'isEmpty' => 'Email address is required', 
                        ) 
                    ), 
                ), 
            ), 
        ])); 
 
        $inputFilter->add($factory->createInput([ 
            'name' => 'country', 
            'filters' => array( 
                array('name' => 'StripTags'), 
                array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
                array ( 
                    'name' => 'InArray', 
                    'options' => array( 
                            'haystack' => array(0,1) 
                        'messages' => array(, 
                            'notInArray' => 'undefined' 
                        ), 
                    ), 
                ), 

            ), 
        ])); 
 
            $this->inputFilter = $inputFilter; 
        } 
        
        return $this->inputFilter; 
    } 
}