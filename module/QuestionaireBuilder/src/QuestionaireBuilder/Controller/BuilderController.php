<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/QuestionaireBuilder for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace QuestionaireBuilder\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BuilderController extends AbstractActionController
{
    protected $questions;

    public function indexAction()
    {
        return array();
    }
    
    public function buildAction()
    {
        $questions = $this->getQuestions();
        $admin_tabs_view = new ViewModel();
        $admin_tabs_view->setTemplate('reporting/admin/parts/tabs-menu');
        $view =  new ViewModel(array(
            'questions' => $questions,
        ));
        $view->addChild($admin_tabs_view,'adminTabsView');
        return $view;
    }

    public function questionnaireAction()
    {
        $questions = $this->getQuestions();
        $admin_tabs_view = new ViewModel();
        $admin_tabs_view->setTemplate('reporting/admin/parts/tabs-menu');
        $view =  new ViewModel(array(
            'questions' => $questions,
        ));
        $view->addChild($admin_tabs_view,'adminTabsView');
        return $view;
    }

    public function newBuildAction()
    {
        $questions = $this->getQuestions();
        $view =  new ViewModel(array(
            'questions' => $questions,
        ));
        return $view;
    }

    public function doneAction() 
    {
        return new ViewModel();
    }

    public function moreInfoAction() 
    {
        $view = new ViewModel();
        return $view;
    }

    public function getQuestions() {
        if (!isset($this->questions)) {
            $this->questions = $this->getServiceLocator()->get('QuestionRepository');
        }
        return $this->questions;
    }

    
}
