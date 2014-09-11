<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Reporting\Controller\Dashboard' => 'Reporting\Controller\DashboardController',
            'Reporting\Controller\Admin' => 'Reporting\Controller\AdminController',
            'Reporting\Controller\Manager' => 'Reporting\Controller\ManagerController',
            'Reporting\Controller\Loader' => 'Reporting\Controller\LoaderController',
            'Reporting\Controller\Home'=> 'Reporting\Controller\HomeController'
        ),
    ),
    'router' => array(
        'routes' => array(
            'reporting' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Reporting\Controller',
                        'controller'    => 'Home',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'dashboard-interface' => array(
                       'type' => 'Segment',
                       'options' => array(
                           'route' => 'dashboard[/:action]',
                           'constraints' => array(
                               'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                           ),
                           'defaults' => array(
                               'controller' => 'dashboard',
                               'action' => 'index',
                           ), ), ),
                    'admin-interface' => array(
                       'type' => 'Segment',
                       'options' => array(
                           'route' => 'admin[/:action]',
                           'constraints' => array(
                               'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                           ),
                           'defaults' => array(
                               'controller' => 'admin',
                               'action' => 'index',
                           ), ), ),
                     'manager-interface' => array(
                       'type' => 'Segment',
                       'options' => array(
                           'route' => 'manager[/:action]',
                           'constraints' => array(
                               'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                           ),
                           'defaults' => array(
                               'controller' => 'manager',
                               'action' => 'review-assignment',
                           ), ), ),
                     'loader-interface' => array(
                       'type' => 'Segment',
                       'options' => array(
                           'route' => 'loader[/:action]',
                           'constraints' => array(
                               'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                           ),
                           'defaults' => array(
                               'controller' => 'loader',
                               'action' => 'index',
                           ), ), ),
                     'site-pages' => array(
                       'type' => 'Segment',
                       'options' => array(
                           'route' => 'site[/:action]',
                           'constraints' => array(
                               'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                           ),
                           'defaults' => array(
                               'controller' => 'home',
                               'action' => 'index',
                           ), ), ),
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Reporting' => __DIR__ . '/../view',
        ),
    ),
);
