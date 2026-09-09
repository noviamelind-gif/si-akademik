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
        ],

        '/mahasiswa/{id}/edit' => [
            'controller' => 'MahasiswaController',
            'method' => 'edit',
            'middleware' => ['AuthMiddleware']
        ],

        '/prodi' => [
            'controller' => 'ProdiController',
            'method' => 'index',
            'middleware' => ['AuthMiddleware']
        ],

        '/prodi/create' => [
            'controller' => 'ProdiController',
            'method' => 'create',
            'middleware' => ['AuthMiddleware']
        ],

        '/prodi/{id}/edit' => [
            'controller' => 'ProdiController',
            'method' => 'edit',
            'middleware' => ['AuthMiddleware']
        ],
    ],

    'POST' => [

        '/login' => [
            'controller' => 'AuthController',
            'method' => 'login'
        ],

        '/mahasiswa' => [
            'controller' => 'MahasiswaController',
            'method' => 'store',
            'middleware' => ['AuthMiddleware']
        ], 

        '/mahasiswa/{id}/update' => [
            'controller' => 'MahasiswaController',
            'method' => 'update',
            'middleware' => ['AuthMiddleware']
        ],

        '/mahasiswa/{id}/delete' => [
            'controller' => 'MahasiswaController',
            'method' => 'destroy',
            'middleware' => ['AuthMiddleware']
        ],

        '/prodi' => [
            'controller' => 'ProdiController',
            'method' => 'store',
            'middleware' => ['AuthMiddleware']
        ],

        '/prodi/{id}/update' => [
            'controller' => 'ProdiController',
            'method' => 'update',
            'middleware' => ['AuthMiddleware']
        ],

        '/prodi/{id}/delete' => [
            'controller' => 'ProdiController',
            'method' => 'destroy',
            'middleware' => ['AuthMiddleware']
        ],
    ]

];