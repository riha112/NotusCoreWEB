<?php
//Functional as F
use Siler\{Route, Dotenv, Twig};
use Medoo\Medoo;
use Notus\Modules\Message\MessageController as MSG;
use Notus\App\Pages;
require_once __DIR__.'/vendor/autoload.php';

//ini_set('SMTP', 'mysmtphost'); 
ini_set('smtp_port', 1025); 
@ini_set('display_errors', 0);


if(!isset($_SESSION)) {
    session_start();
}

// Clear MSG log
//MSG::getBundlesOutput();
//MSG::clearBundle();

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

// TODO: MOVE TO ROUTES.PHP
Route\get('/api', 'Notus\App\Pages\ApiPage::_init');
Route\post('/api', 'Notus\App\Pages\ApiPage::_init');

Route\get('/', 'Notus\App\Pages\LandingPage::_init');
Route\get('/login', 'Notus\App\Pages\AuthenticationPage::_init');
Route\post('/login', 'Notus\App\Pages\AuthenticationPage::_init');

Route\get('/post/new', 'Notus\App\Pages\NewPostPage::_init');
Route\post('/post/new', 'Notus\App\Pages\NewPostPage::_init');

Route\get('/post/edit', 'Notus\App\Pages\PostEditPage::_init');
Route\post('/post/edit', 'Notus\App\Pages\PostEditPage::_init');

Route\get('/forum', 'Notus\App\Pages\ForumPage::_init');
Route\post('/forum', 'Notus\App\Pages\ForumPage::_init');

Route\get('/profile', 'Notus\App\Pages\ProfilePage::_init');
Route\post('/profile', 'Notus\App\Pages\ProfilePage::_init');

Route\get('/docs', 'Notus\App\Pages\DocsPage::_init');


if(isset($_SESSION["ACCESS_DENIED"]) && $_SESSION["ACCESS_DENIED"] == TRUE){
    echo "ACCESS DENIED";
    unset($_SESSION["ACCESS_DENIED"]);
}elseif($_SESSION["404"] ?? TRUE == TRUE){
    Notus\App\Pages\Page404::_init();
    unset($_SESSION["404"]);    
}


// Saves msgs
MSG::saveBundle();

//Route\post('/', $page->getOutput());
//Route\get('/Hy', F\puts('Hy!'));
