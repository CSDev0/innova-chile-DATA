<?php
namespace Views;

/**
 * Plnatilla provicional para una posible vista de uarios
 */
class UsersView extends Users
{

  public function showUsersByName($name)
  {
    $result = $this->getUser($name);
    echo "Nombre de Usuario: ".$result['users_name'];
    echo "Email de Usuario: ".$result['users_email'];
    echo "Pasword de Usuario: ".$result['users_pwd'];
  }
}

 ?>
