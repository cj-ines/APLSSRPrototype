<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Reporting for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Reporting;

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

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                //FORMS
                'UserLoaderForm' => function ($sm) {
                    $form = new \Reporting\Form\UserLoaderForm();
                    $form->setInputFilter($sm->get('UserLoaderFilter'));
                    return $form;
                },
                'ContactUsForm' => function ($sm) {
                    $form = new \Reporting\Form\ContactUsForm();
                    $form->setInputFilter($sm->get('ContactUsFilter'));
                    return $form;
                },
                //INPUT FILTERS
                'UserLoaderFilter' => function ($sm) {
                    return new \Reporting\Form\UserLoaderFilter();
                },
                'ContactUsFilter' => function ($sm) {
                    return new \Reporting\Form\ContactUsFilter();
                },
                // MORE
                'UserLoaderFormFactory' => function ($sm) {
                    $form = $sm->get('UserLoaderForm');
                    $upload_form_view = new \Zend\View\Model\ViewModel(array('userLoaderForm' => $form));
                    $upload_form_view->setTemplate('reporting/loader/parts/upload-form');
                    return $upload_form_view;
                },

                'SampleEmployees' => function ($sm) {
                    $data[] = array(
                        'first_name' => 'John',
                        'last_name' => 'Doe',
                        'role' => 'SSR / Trade Analyst',
                        'email' => 'john.doe@email.com',
                        'status' => 'no',
                        'country' => 'USA',
                        'reviewers' => array(
                            array(
                                'first_name' => 'Gary',
                                'last_name' => 'Oak',
                                'country' => 'USA',
                                'email' => 'gary.oak@email.com',
                                'role' => 'ESR',
                                'status' => 'no'
                            ),
                            array(
                                'first_name' => 'Horihito',
                                'last_name' => 'Kazuma',
                                'country' => 'USA',
                                'email' => 'hkazuma@email.com',
                                'role' => 'ESR',
                                'status' => 'no'
                            ),
                            array(
                                'first_name' => 'Juddie',
                                'last_name' => 'Abbot',
                                'country' => 'USA',
                                'email' => 'judabbot@email.com',
                                'role' => 'ESR',
                                'status' => 'no'
                            ),
                        ),
                    );

                    $data[] = array(
                        'first_name' => 'Diana Rose',
                        'last_name' => 'Stalone',
                        'role' => 'SSR / Trade Analyst',
                        'email' => 'diana@email.com',
                        'country' => 'USA',
                        'status' => 'no',
                        'reviewers' => array(
                            array(
                                'first_name' => 'John',
                                'last_name' => 'Presley',
                                'country' => 'USA',
                                'email' => 'johnp@email.com',
                                'role' => 'ESR',
                                'status' => 'no'
                            ),
                            array(
                                'first_name' => 'Markus',
                                'last_name' => 'Camby',
                                'country' => 'USA',
                                'email' => 'mcmc@email.com',
                                'role' => 'ESR',
                                'status' => 'yes'
                            ),
                            array(
                                'first_name' => 'Kolehai',
                                'last_name' => 'Haineko',
                                'country' => 'USA',
                                'email' => 'khaineko@email.com',
                                'role' => 'ESR',
                                'status' => 'no'
                            ),
                             array(
                                'first_name' => 'Domo Arigato San',
                                'last_name' => 'Haineko',
                                'country' => 'USA',
                                'email' => 'domoa@email.com',
                                'role' => 'ESR',
                                'status' => 'no'
                            ),
                              array(
                                'first_name' => 'Ho Chi ',
                                'last_name' => 'Mihn',
                                'country' => 'USA',
                                'email' => 'saigon@email.com',
                                'role' => 'ESR',
                                'status' => 'no'
                            ),
                        ),
                    );

                    $data[] = array(
                        'first_name' => 'Cristopher',
                        'last_name' => 'Dela Mortiz',
                        'role' => 'SSR / Trade Analyst',
                        'email' => 'cmortiz@email.com',
                        'country' => 'USA',
                        'status' => 'yes',
                        'reviewers' => array(
                            array(
                                'first_name' => 'John',
                                'last_name' => 'Presley',
                                'country' => 'USA',
                                'email' => 'johnp@email.com',
                                'role' => 'ESR',
                                'status' => 'no'
                            ),
                        ),
                    );

                    return $data;
                }
            )
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
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
