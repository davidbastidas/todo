<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__). DIRECTORY_SEPARATOR .'..',
    'name' => '',//Applus
    'language' => 'es',
    'sourceLanguage' => 'en',
    'charset' => 'utf-8',
    'theme' => 'tema2',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    	'application.extensions.GridView.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'application.extensions.gii.GiiModule',
            'password' => '12345',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1', '191.102.216.6', '186.1.162.82',),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl'=>array('site/login'),
        ),
        // uncomment the following to enable URLs in path-format
        'authManager' => array(
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
            'itemTable' => 'auth_item',
            'itemChildTable' => 'auth_relacion',
            'assignmentTable' => 'auth_asignacion',
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        /*
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
         */
        // uncomment the following to use a MySQL database

        'db' => array(//para usuarios y demas
            'connectionString' => 'mysql:host=127.0.0.1;dbname=applus',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'logueo_admin' => 'ADMINISTRADOR',
        'logueo_registrado' => 'Mensajeria',
        'sin_logueo' => '<b>Applus</b>',
        'pathlocal' => 'C:\wamp\www',///usr/local/apache2/htdocs/gestioneca/
        'pathlocalsimple' => 'C:/wamp/www/',///usr/local/apache2/htdocs/gestioneca/
        'pathbarrainvertida' => 'C:\\wamp\\www\\',
        'ruta_informes_barra_inversa' => 'C:\\wamp\\www\\archivos\\informes\\',///opt/lampp/htdocs/gestioneca/files/
        'ruta_pruebas_aceite' => 'C:\\wamp\\www\\archivos\\aceite\\',///opt/lampp/htdocs/gestioneca/files/
        'ruta_informes' => 'C:/wamp/www/archivos/informes/',///opt/lampp/htdocs/gestioneca/files/
        'ruta_fotos' => 'C:/wamp/www/archivos/fotos/',//esto son los anexos de transformadores
        'ruta_fotos_interruptor_potencia' => 'C:/wamp/www/archivos/fotos_interruptor_potencia/',//anexos interruptores
        'ruta_fotos_corriente_exitacion_tc' => 'C:/wamp/www/archivos/fotos_corriente_exitacion_tc/',//anexos corriente exitacion
        'ruta_fotos_equipos' => 'C:/wamp/www/archivos/fotos_equipos/',//fotos de cada equipo
        'nameproyect' => 'todo', //todos/todo_ap_atlantico
        'imagenes_todo' => 'C:/wamp/www/todo/images/',
        'server' => '127.0.0.1',
        'db' => 'ap_equipos',
        'userdb' => 'andiceco_gestion',
        'passdb' => 'andiceeca2014',
        'breadcrumbs' => '<div class="breadcrumbs" id="breadcrumbs"><ul class="breadcrumb"><li class="active"><i class="icon-home home-icon"></i>Inicio</li></ul></div>',
    ),
);