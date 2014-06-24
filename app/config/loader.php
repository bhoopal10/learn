<?php

$loader = new \Phalcon\Loader();
/**
 * We're a registering a set of directories taken from the configuration file
 */
// $loader->registerDirs(
//     array(
//         $config->application->controllersDir,
//         $config->application->modelsDir,
// 		$config->application->libraryDir
//     )
// );

$loader->registerNamespaces(array(
    'Learn\Models'           => $config->application->modelsDir,
    'Learn\Controllers'      => $config->application->controllersDir,
    'Learn'                  => $config->application->libraryDir,
    'Aws'                   =>$config->application->libraryDir.'Aws',
    'Guzzle'                =>$config->application->libraryDir.'Guzzle',
    'Symfony'               =>$config->application->libraryDir.'symfony',
    'PHPVideoToolkit'       =>$config->application->libraryDir.'PHPVideoToolkit',
    'Database'              =>$config->application->libraryDir.'Database',
    'facebook'              =>$config->application->libraryDir.'facebook',
    'Google'                =>$config->application->libraryDir.'Google',


));

$loader->register();
