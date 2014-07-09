<?php

    $router = new \Phalcon\Mvc\Router;

    $router->add('/signin',array(
        'controller'    =>  'Session',
        'action'        =>  'signin'
        ));

    /* Routes for Slug */
    $router->add('/school/{slug:[a-z0-9-]+}\/?',array(
        'namespace'     =>  'Learn\Controllers\slug',
        'controller'    =>  'Index',
        'action'        =>  'index'
        ));

    $router->add('/school/{slug:[a-z0-9-]+}/:controller',array(
        'namespace'     =>  'Learn\Controllers\slug',
        'controller'    =>  2,
        'action'        =>  'index'
        ));
    $router->add('/school/{slug:[a-z0-9-]+}/:controller/:action',array(
        'namespace'     =>  'Learn\Controllers\slug',
        'controller'    =>  2,
        'action'        =>  3
        ));
    $router->add('/school/{slug:[a-z0-9-]+}/:controller/:action/:int',array(
        'namespace'     =>  'Learn\Controllers\slug',
        'controller'    =>  2,
        'action'        =>  3,
        'int'         =>  4
        ));
  
    /*Routes for Admin*/

    $router->add('/admin',array(
        'namespace' =>'Learn\Controllers\admin',
        'controller'=>'Index',
        'action'    =>'index'
        ));
     $router->add('/admin/',array(
        'namespace' =>'Learn\Controllers\admin',
        'controller'=>'Index',
        'action'    =>'index'
        ));
    $router->add('/admin/:controller/:action',array(
        'namespace'=>'Learn\Controllers\admin',
        'controller'=>1,
        'action'    =>2
        ));
     $router->add('/admin/:controller/:action/:int',array(
        'namespace' =>'Learn\Controllers\admin',
        'controller'=>1,
        'action'    =>2,
        'param'     =>3
        ));
    $router->add('/admin/:controller/',array(
        'namespace' =>'Learn\Controllers\admin',
        'controller'=>1,
        'action'    =>'index'
        ));
    /*
     *Default Routes for Channel
    */

    $router->add('/channel',array(
        'namespace' =>'Learn\Controllers\channel',
        'controller'=>'Index',
        'action'    =>'index'
        ));
     $router->add('/channel/',array(
        'namespace' =>'Learn\Controllers\channel',
        'controller'=>'Index',
        'action'    =>'index'
        ));
    $router->add('/channel/:controller/:action',array(
        'namespace' =>'Learn\Controllers\channel',
        'controller'=>1,
        'action'    =>2
        ));
    $router->add('/channel/:controller/:action/:int',array(
        'namespace' =>'Learn\Controllers\channel',
        'controller'=>1,
        'action'    =>2,
        'id'     =>3
        ));
    $router->add('/channel/:controller/',array(
        'namespace' =>'Learn\Controllers\channel',
        'controller'=>1,
        'action'    =>'index'
        ));
    $router->addPost('/admin/channel/test',array(
    'namespace'  =>'Learn\Controllers\admin',
    'controller' =>'channel',
    'action'     =>'test'
    ));
    return $router;
