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
    public function indexAction()
    {
        
        $questions = array (
            'Q1' => 'SSR provides high quality market intelligence',
            'Q2' => 'SSR is effective at handling & channeling incoming leads',
            'Q3' => 'SSR is effective at making cold calls to generate leads',
        );
        $view = new ViewModel(array('questions'=>$questions));
        
        $answers_view = new ViewModel(array('question' => $questions));
        $answers_view->setTemplate('web-survey/survey/parts/answers');
        foreach ($questions as $key => $q) {
            $question_view = new ViewModel(array('question' => $q));
            $question_view->setTemplate('web-survey/survey/parts/answers');
            $view->addChild($question_view,$key);
        }
        
        $view->addChild($answers_view,'answers');
        return $view;
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /survey/survey/foo
        return array();
    }
    
    public function thankyouAction() {
    	return new ViewModel();
    }
    
    public function refuseAction() {
    	return new ViewModel();
    }
}
