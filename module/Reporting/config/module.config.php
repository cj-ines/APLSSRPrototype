<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Reporting\Controller\Dashboard' => 'Reporting\Controller\DashboardController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'reporting' => array(
                'type'    => 'Segment',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/[dashboard/:mode[/:action]]',
                	'constraints' => array(
                		'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                		'mode' => '[a-zA-Z][a-zA-Z0-9_-]*',
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
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
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
