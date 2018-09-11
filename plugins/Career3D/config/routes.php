<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'Career3D',
    ['path' => '/career3-d'],
    function ($routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);
