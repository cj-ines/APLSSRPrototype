<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/QuestionaireBuilder for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace QuestionaireBuilder;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
		    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/' , __NAMESPACE__),
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig() 
    {
        return array(
            'factories' => array(
                'QuestionRepository' => function ($sm) {
                    return array (
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
                },
            ),
        );
    }

    public function onBootstrap(MvcEvent $e)
    {
        // You may not need to do this if you're doing it elsewhere in your
        // application
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }
}
