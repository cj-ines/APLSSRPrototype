<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Reporting\Controller\Dashboard' => 'Reporting\Controller\DashboardController',
            'Reporting\Controller\Admin' => 'Reporting\Controller\AdminController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'reporting' => array(
                'type'    => 'Segment',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/[dashboard/:action]',
                	'constraints' => array(
                		'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                		//'mode' => '[a-zA-Z][a-zA-Z0-9_-]*',
                	),
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Reporting\Controller',
                        'controller'    => 'Dashboard',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'admin-interface' => array(
                       'type' => 'Segment',
                       'options' => array(
                           'route' => '/admin[/:action]',
                           'constraints' => array(
                               'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                           ),
                           'defaults' => array(
                               'controller' => 'admin',
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
