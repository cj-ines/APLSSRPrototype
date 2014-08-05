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
    public function indexAction()
    {
        $scorings = array (
        	'Lead Generation' => array(
        		'Q1' => 'SSR provides high quality market intelligence',
        		'Q2' => 'SSR is effective at handling & channeling incoming leads',
        		'Q3' => 'SSR is effective at making cold calls to generate leads',
        	),
            'Agreement Negiotiation' => array('Q4' => '','Q5' => '','Q6' => '','Q7' => '','Q8' => ''),
            'Post-close' => array('Q9' => ''),
            'Account Admin' => array('Q10' => '','Q11' => '','Q12' => ''),
            'Internal Admin' => array('Q13' => '','Q14' => '','Q15' => ''),
            'Exception' => array('Q16' => ''),
        );
        $filters_view = new ViewModel();
        $filters_view->setTemplate('reporting/dashboard/parts/filters');
        $scorecards = array();
        $view = new ViewModel(array(
        	'scoring' => $scorings,
        ));
        foreach ($scorings as $scoring => $questions ) {
            $score_view = new ViewModel(array(
            	'title' => $scoring,
            	'questions' => $questions,
            ));
            $score_view->setTemplate('reporting/dashboard/parts/scores');
            $view->addChild($score_view,$scoring);
        }
        
        $view->addChild($filters_view,'filters');
        return $view;
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /dashboard/dashboard/foo
        return array();
    }
}
