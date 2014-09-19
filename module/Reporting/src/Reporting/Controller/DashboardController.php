<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Reporting for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Reporting\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DashboardController extends AbstractActionController
{
    protected $scoring;
    protected $data;
	public function indexOldAction()
    {
    	$compare = $this->params()->fromQuery('compare');
    	$scorings = $this->getScoring();
        $data = $this->getData();
        $filters_view = new ViewModel();
        $filters_view->setTemplate('reporting/dashboard/parts/filters');
        $dashbord_view = new ViewModel(array(
        	'scoring' => $scorings,
        ));
        $dashbord_view->setTemplate('reporting/dashboard/parts/dashboard');
        $scorecards = array();
        $view = new ViewModel();
        foreach ($scorings as $scoring => $questions ) {
            $score_view = new ViewModel(array(
            	'title' => $scoring,
            	'questions' => $questions,
            ));
            if ($compare=='') {
            	$score_view->setTemplate('reporting/dashboard/parts/scores');
            } else {
            	$score_view->setTemplate('reporting/dashboard/parts/scores-compare');
            }
            $dashbord_view->addChild($score_view,$scoring);
        }
        
        $view->addChild($filters_view,'filters');
        $view->addChild($dashbord_view,'dashboard');
        return $view;
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /dashboard/dashboard/foo
        return array();
    }
    
    public function indexAction() {
    	$scorings = $this->getScoring();
        $data = $this->getData();
    	$filter_view = new ViewModel(array(
            'scorings' => $scorings,
            'data' => $data,
        ));
    	$filter_view->setTemplate('reporting/dashboard/parts/filters');
    	$score_table_view = new ViewModel(array(
    		'scorings' => $scorings, 
    	));
    	$score_table_view->setTemplate('reporting/dashboard/parts/score-table');    	
    	$view = new ViewModel();

        $campaign_progress_view = new ViewModel();
        $campaign_progress_view->setTemplate('reporting/dashboard/parts/campaign-progress');
        $rankings_view = new ViewModel();
        $rankings_view->setTemplate('reporting/dashboard/parts/rankings');

        $periods_view = new ViewModel();
        $periods_view->setTemplate('reporting/dashboard/parts/periods');

    	$view->addChild($score_table_view,'scoreTable')
            ->addChild($filter_view,'filters')
            ->addChild($campaign_progress_view,'campaignProgress')
            ->addChild($rankings_view,'rankings')
            ->addChild($periods_view,'periods')
        ;
    	return $view;
    }
    
    public function getScoring() {
    	if (!isset($this->scoring)) {
    		$this->scoring = $this->getServiceLocator()->get('QuestionRepository');
    	}
    	return $this->scoring;
    }

    public function getData() {
        if (!isset($this->data)) {
            $this->data = $this->getServiceLocator()->get('SampleEmployees');
        }

        return $this->data;
    }
}
