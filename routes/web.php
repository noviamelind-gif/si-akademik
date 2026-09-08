<?php

return [

    '/' => [
        'controller' => 'HomeController',
        'method' => 'index'
    ],

    '/mahasiswa' => [
        'controller' => 'MahasiswaController',
        'method' => 'index'
    ],

    '/mahasiswa/create' => [
        'controller' => 'MahasiswaController',
        'method' => 'create'
    ],

];