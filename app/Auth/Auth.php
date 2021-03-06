<?php

namespace App\Auth;

use App\Models\User;

class Auth
{

 public function user()
 {
  if (isset($_SESSION['user'])) {
   return User::find($_SESSION['user']);
  }
 }

 public function check()
 {
  return isset($_SESSION['user']);
 }

 public function attempt($username, $password)
 {

  $user = User::where('username', $username)->first();

  if (!$user) {
   return false;
  }

  if ($user->password === $password) {

   $_SESSION['user'] = $user->id;

   return true;
  }
  return false;

 }

}
