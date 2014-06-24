<?php

    $router = new \Phalcon\Mvc\Router;

    $router->addGet("/login", "home::login")->setName("login");



    /*
     * Routes for Trainer
     *
     * */






    /*Routes for Admin*/


    /*
     *Default Routes
    */
    return $router;
