<?php

namespace App\Middleware;

class AuthMiddleware extends Middleware
{

 public function __invoke($request, $response, $next)
 {

  if (isset($_SESSION['user_name'])) {
   $this->container->view->getEnvironment()->addGlobal('user_name', $_SESSION['user_name']);
   $_SESSION['user_name'] = $request->getParam('username');

  }

  $response = $next($request, $response);
  return $response;

 }
}
