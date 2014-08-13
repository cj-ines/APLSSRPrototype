<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'WebSurvey\Controller\Survey' => 'WebSurvey\Controller\SurveyController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'web-survey' => array(
                'type'    => 'Segment',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/survey[/:action[/:mode]]',
                	'constraints' => array(
                		'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'mode' => '[a-zA-Z][a-zA-Z0-9_-][ ]*',
                	),
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'WebSurvey\Controller',
                        'controller'    => 'Survey',
                        'action'        => 'index',
                        'mode'          => 'General'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    /*'default' => array(
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
                    ), */
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'WebSurvey' => __DIR__ . '/../view',
        ),
    ),
);
