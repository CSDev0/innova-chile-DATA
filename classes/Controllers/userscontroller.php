<?php
namespace Controllers;

/**
 * Plantilla provicional para un controller de usuarios;
 */
class UsersController extends Users
{

  public function createUser($name,$email,$pwd)
  {
    $this->setUser($name,$email,$pwd);
  }
}

 ?>
