<?php

namespace App\Controllers;

class AuthController extends Controller
{

 public function index($request, $response)
 {

  return $this->view->render($response, 'login.twig', [
   'title' => 'Travel Nepal | Login',
  ])->withStatus(200);

 }
 public function postLogin($request, $response)
 {

  $username = $request->getParam('username');
  $password = $request->getParam('password');

  $auth = $this->auth->attempt($username, $password);

  if (!$auth) {
   $this->flash->addMessage('error', 'Failed To Login | Username and Password Not Match');
   return $response->withRedirect($this->router->pathFor('auth.getSignin'));
  }
  return $response->withRedirect($this->router->pathFor('dash'));

 
}

public function getLogout($request,$response)
{
   unset($_SESSION['user']);
   session_destroy();
   return $response->withRedirect($this->router->pathFor('auth.getSignin'));
}

}
