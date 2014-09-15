<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'QuestionaireBuilder\Controller\Builder' => 'QuestionaireBuilder\Controller\BuilderController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'questionaire-builder' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/questionaire-builder',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'QuestionaireBuilder\Controller',
                        'controller'    => 'Builder',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'build-interface' => array(
                    	'type' => 'Segment',
                    	'options' => array(
                   			'route' => '/build[/:action]',
                    	    'constraints' => array(
                    	    	'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    	    ),
                   			'defaults' => array(
                   				'controller' => 'builder',
                   				'action' => 'questionnaire',
                   			),
                   		),
                   	),
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
            'QuestionaireBuilder' => __DIR__ . '/../view',
        ),
    ),
);
