<?php 

require_once("vendor/autoload.php"); //Composer
use \Slim\Slim;
use \Hcode\Page;

$app = new \Slim\Slim(); // 

$app->config('debug', true); // tratando erro

$app->get('/', function() { // rota
    
$page = new Page();
$page->setTpl("index");



});

$app->run();

 ?>