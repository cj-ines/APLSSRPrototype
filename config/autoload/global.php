<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'db' => array(
        'driver'    => 'PdoMysql',
        'hostname'  => 'mysqlsdb.co8hm2var4k9.eu-west-1.rds.amazonaws.com',
        'database'  => 'depdah837y2',
        'username'  => 'depdah837y2',
        'password'  => 'aXM7dgLvanMG',
    ),
    'service_manager' => array(
    	'factories' => array(
    		'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
    	),
    ),
    'email_config' => array(
        'email_address' => 'cj.ines@zoop.net'
    ),
);
