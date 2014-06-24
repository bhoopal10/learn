<?php


use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Crypt;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Files as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Direct as Flash;
use Learn\Auth\Auth,
	Phalcon\Logger\Adapter\File as Logger,
    Phalcon\Db\Adapter\Pdo\Mysql as Connection,
    Phalcon\Events\Manager as EventManager,
    Learn\Acl\Acl;
/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);
    return $url;
}, true);

/**
 * Setting up the view component
 */

$di->set('view', function () use ($config) {

    $view = new View();

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {

            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '-'
            ));
            $volt->getCompiler()->addFunction('ng', function($input) {
                return '"{{".' . $input . '."}}"';
            });
            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
}, true);

/**
* Dispatcher use a default namespace
*/
$di->set('dispatcher', function () {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace('Learn\Controllers');
    return $dispatcher;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) 
{
    \Phalcon\Mvc\Model::setup(array(
        'events' => true,
        'notNullValidations' => false
    ));
	$eventsManager = new \Phalcon\Events\Manager();

	    $logger = new Logger($config->application->logDir.'db.log');

	    //Listen all the database events
	    $eventsManager->attach('db', function($event, $connection) use ($logger) {
	        if ($event->getType() == 'beforeQuery') {
	            $logger->log($connection->getSQLStatement());

	        }
	    });

	    $connection = new Connection(array(
	        "host" => $config->database->host,
	        "username" => $config->database->username,
	        "password" => $config->database->password,
	        "dbname" => $config->database->dbname
	    ));

	    //Assign the eventsManager to the db adapter instance
	    $connection->setEventsManager($eventsManager);

	    return $connection;
});


/**
* Crypt service
*/
$di->set('crypt', function () use ($config) {
    $crypt = new Crypt();
    $crypt->setKey($config->application->cryptSalt);
    return $crypt;
});

/**
 * Register the flash service with custom CSS classes
 */
$di->set('flash', function(){
        $flash = new Phalcon\Flash\Direct(array(
                'error' => 'alert alert-error',
                'success' => 'alert alert-success',
                'notice' => 'alert alert-info',
        ));
        return $flash;
});
/*
	Loading external router
*/
$di->set('router', function(){
    require 'routes.php';
    return $router;
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () use($config) {
    return new MetaDataAdapter(array(
        'metaDataDir' => $config->application->cacheDir . 'metaData/'
    ));});

$di->set('modelsManager', function() {
      return new Phalcon\Mvc\Model\Manager();
 });
/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

/**
 * Custom authentication component
 */
$di->set('auth', function () {
    return new Auth();
});

/**
 * Access Control List
 */
$di->set('acl', function () {
    return new Acl();
});
/**
 * Assign Array_column
 */
$di->set('array_column',function(){
   return new Functions();
});
$di->set('security', function(){

    $security = new Phalcon\Security();

    //Set the password hashing factor to 12 rounds
    $security->setWorkFactor(12);

    return $security;
}, true);

