<?php

session_cache_limiter(false);
session_start();

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
 'settings' => [
  'displayErrorDetails' => true,
  'db'                  => [
   'driver'    => 'mysql',
   'host'      => 'localhost',
   'database'  => 'travelnepaldb',
   'username'  => 'root',
   'password'  => '',
   'charset'   => 'utf8',
   'collation' => 'utf8_unicode_ci',
   'prefix'    => '',
  ],
  // 'upload_directory' =>'__DIR__ . /uploads'
 ],

]);

$container = $app->getContainer();
$capsule   = new \Illuminate\Database\Capsule\Manager;

$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {

 return $capsule;
};

$container['auth'] = function ($container) {
 return new \App\Auth\Auth;

};

$container['view'] = function ($container) {

 $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
  'cache' => false,
 ]);

 $view->addExtension(new \Slim\Views\TwigExtension(

  $container->router,
  $container->request->getUri()

 ));

 $view->getEnvironment()->addGlobal('flash', $container->flash);
 $view->getEnvironment()->addGlobal('auth', [

  'check' => $container->auth->check(),
  'user'  => $container->auth->user(),

 ]);

 return $view;
};

$container['validator'] = function ($container) {
 return new App\Validation\Validator;
};
$container['flash'] = function ($container) {
 return new \Slim\Flash\Messages;

};
$container['AuthController'] = function ($container) {

 return new \App\Controllers\AuthController($container);
};

$container['HomeController'] = function ($container) {

 return new \App\Controllers\HomeController($container);
};
$container['PostController'] = function ($container) {

 return new \App\Controllers\PostController($container);
};
$container['PutController'] = function ($container) {

 return new \App\Controllers\PutController($container);
};

$app->add(new \App\Middleware\ValidationErrorMiddleWare($container));
$app->add(new \App\Middleware\OldInputMiddleware($container));
// $app->add(new \App\Middleware\AuthMiddleware($container));

require __DIR__ . '/../app/routes.php';
