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
                        'Relationship Management' => array(
                            'Q1' => 'The sales rep spends enough time with my business',
                            'Q2' => 'The sales rep is professional, corteous and treats me with respect',
                        ),
                        'Transaction Service Support' => array(
                            'Q3' => 'The sales rep is responsive to my inquiries',
                            'Q4' => 'The sales rep clearly understands my business requirements',
                        ),
                        'Lead Generation' => array(
                            'Q5' => 'The sales rep is knowledgable about APL\'s services',
                        ),
                        'Overall' => array(
                            'Q6' => 'Overall, I am satisfied with the sales rep\'s servies',
                            'Q7' => 'Overall, how does the sales rep compare the competition?',
                        ),
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
