<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/WebSurvey for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace WebSurvey\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SurveyController extends AbstractActionController
{
    public $questions;

    public function indexAction()
    {
        
        $questions = $this->getQuestions();
        $modes = $this->addIndexQuestions($questions);
        $mode = $modes[$this->params()->fromRoute('mode')];
       
        $view = new ViewModel(array(
            'questions'=> $questions[$mode],
            'mode' => $mode,
            'questionnaire' => $modes,
        ));
        
        $answers_view = new ViewModel(array('question' => $questions));
        $answers_view->setTemplate('web-survey/survey/parts/answers');
        $confirm_identity_view = new ViewModel();
        $confirm_identity_view->setTemplate('web-survey/survey/parts/confirm-identity');

        foreach ($questions as $key => $q) {
            $question_view = new ViewModel(array('question' => $q));
            $question_view->setTemplate('web-survey/survey/parts/answers');
            $view->addChild($question_view,$key);
        }
        
        $view->addChild($answers_view,'answers');
        $view->addChild($confirm_identity_view,'confirmIdentity');
        return $view;
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /survey/survey/foo
        return array();
    }
    
    public function thankyouAction() 
    {
    	return new ViewModel();
    }
    
    public function refuseAction()
    {
    	return new ViewModel();
    }
    
    public function practiceAction() 
    {
    	return new ViewModel();
    }

    public function postponeAction() 
    {
        return new ViewModel();
    }

    public function getQuestions() 
    {
        if (!isset($this->questions)) {
            $this->questions = $this->getServiceLocator()->get('QuestionRepository');
        }
        return $this->questions;
    }
    public function addIndexQuestions($questions)
    {
        $arr = array();
        foreach ($questions as $key =>$question) {
            $arr[] = $key;
        }
        return $arr;
    }
}
