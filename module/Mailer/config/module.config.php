<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Mailer\Controller\Mail' => 'Mailer\Controller\MailController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'mailer' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/mailer',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Mailer\Controller',
                        'controller'    => 'Mail',
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
            'Mailer' => __DIR__ . '/../view',
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'MailService' => 'Mailer\Service\MailService',
        ),
    ),
    'module_config' => array(
        'review_respondent_link' => 'http://'. $_SERVER['SERVER_NAME'] . '/manager/review-assignment',
        'sender' => 'cj.ines@zoop.net',
        'survey_link' => 'http://'. $_SERVER['SERVER_NAME'] . '/survey',
    ),
);
