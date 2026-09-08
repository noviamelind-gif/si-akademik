<?php

return [

    'GET' => [

        '/' => [
            'controller' => 'HomeController',
            'method' => 'index'
        ],

        '/login' => [
            'controller' => 'AuthController',
            'method' => 'loginForm'
        ],

        '/logout' => [
            'controller' => 'AuthController',
            'method' => 'logout'
        ],

        '/dashboard' => [
            'controller' => 'HomeController',
            'method' => 'dashboard',
            'middleware' => ['AuthMiddleware']
        ],

        '/mahasiswa' => [
            'controller' => 'MahasiswaController',
            'method' => 'index',
            'middleware' => ['AuthMiddleware']
        ],

        '/mahasiswa/create' => [
            'controller' => 'MahasiswaController',
            'method' => 'create',
            'middleware' => ['AuthMiddleware']
        ]

    ],

    'POST' => [

        '/login' => [
            'controller' => 'AuthController',
            'method' => 'login'
        ]

    ]

];