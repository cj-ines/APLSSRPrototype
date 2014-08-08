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
    public $scoring;
	public function indexOldAction()
    {
    	$compare = $this->params()->fromQuery('compare');
    	$scorings = $this->getScoring();
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
    	$filter_view = new ViewModel();
    	$filter_view->setTemplate('reporting/dashboard/parts/filters');
    	$score_table_view = new ViewModel(array(
    		'scorings' => $scorings, 
    	));
    	$score_table_view->setTemplate('reporting/dashboard/parts/score-table');    	
    	$view = new ViewModel();
    	$view->addChild($score_table_view,'scoreTable');
    	$view->addChild($filter_view,'filters');
    	return $view;
    }
    
    public function getScoring() {
    	if (!isset($this->scoring)) {
    		$this->scoring = array (
        	'Lead Generation' => array(
        		'Q1' => 'SSR provides high quality market intelligence',
        		'Q2' => 'SSR is effective at handling & channeling incoming leads',
        		'Q3' => 'SSR is effective at making cold calls to generate leads',
        	),
            'Agreement Negiotiation' => array(
            	'Q4' => 'SSR makes me feel more prepared for calls/negotiations with clients',
            	'Q5' => 'SSR is helpful in supporting negotiations with Trade and Ops, such as MAR changes and performance feedback to network',
            	'Q6' => 'SSR processes rate filing requests quickly and efficiently',
            	'Q7' => 'SSR processes tariff filing requests quickly and efficiently',
            	'Q8' => 'SSR prepares contracts efficiently and accurately',
           	),
            'Post-close' => array(
            	'Q9' => 'SSR provides timely and accurate account performance reports'
            ),
            'Account Admin' => array(
            	'Q10' => 'SSR sets up accounts (CAP codes) quickly and accurately',
            	'Q11' => 'SSR completes DG requests quickly and accurately',
            	'Q12' => 'SSR processes/validates credit requests quickly',
            ),
            'Internal Admin' => array(
            	'Q13' => 'SSR updates data in CRM on behalf of reps quickly and accurately',
            	'Q14' => 'SSR provides timely forecasts to CCAM',
            	'Q15' => 'SSR executes timely and accurate internal performance reports',
            ),
            'Exception' => array(
            	'Q16' => 'SSR handles exception requests independently and effectively',
           	),
    		'General' => array (
    			'Q17' => 'The SSR communicates effectively with me',
    			'Q18' => 'The SSR is responsive to my inquiries/ requests',
    		)
        );
    	
    	}
    	return $this->scoring;
    }
}
