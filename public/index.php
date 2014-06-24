<?php

error_reporting(E_ALL);
(new Phalcon\Debug)->listen();
try {
	date_default_timezone_set('America/Los_Angeles');

    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../app/config/config.php";

    /**
     * Read auto-loader
     */
    include __DIR__ . "/../app/config/loader.php";
    /**
     * Read services
     */
    include __DIR__ . "/../app/config/services.php";

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);
    $application->setDI($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage().$e->getLine().$e->getFile().$e->getCode().$e->getTraceAsString();
}

