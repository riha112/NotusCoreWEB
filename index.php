<?php
//Functional as F
use Siler\{Route, Dotenv, Twig};
use Medoo\Medoo;
use Notus\Modules\Message\MessageController as MSG;
use Notus\App\Pages;
require_once __DIR__.'/vendor/autoload.php';

if(!isset($_SESSION)) {
    session_start();
}

// Clear MSG log
MSG::clearBundle();

// Config variable init
Dotenv\init('./Notus/config');

// Twig init - For HTML markup
$twig = Twig\init(
    Dotenv\env('TEMPLATES'), 
    Dotenv\env('TEMPLATES_CACHE'), 
    Dotenv\env('TWIG_DEBUG')
);

// Twig custom function init
//Notus\Modules\Twig\TwigFunctions::__init($twig);

// Medoo init - For DB
$database = new Medoo([
'database_type' => Dotenv\env('DB_TYPE'),
    'database_name' => Dotenv\env('DB_NAME'),
    'server' => Dotenv\env('DB_SERVER'),
    'username' => Dotenv\env('DB_USER'),
    'password' => Dotenv\env('DB_PASSWORD'),
]);

var_dump($_SESSION);

// TODO: MOVE TO ROUTES.PHP
Route\get('/', 'Notus\App\Pages\LandingPage::_init');
Route\get('/login', 'Notus\App\Pages\AuthenticationPage::_init');
Route\post('/login', 'Notus\App\Pages\AuthenticationPage::_init');

Route\get('/forum/new', 'Notus\App\Pages\NewPostPage::_init');
Route\post('/forum/new', 'Notus\App\Pages\NewPostPage::_init');

// Saves msgs
MSG::saveBundle();

//Route\post('/', $page->getOutput());
//Route\get('/Hy', F\puts('Hy!'));
