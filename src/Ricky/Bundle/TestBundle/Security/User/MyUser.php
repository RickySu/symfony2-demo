<?php

namespace Ricky\Bundle\TestBundle\Security\User;

use Symfony\Component\Security\Core\User\UserInterface;

class MyUser implements UserInterface
{
    protected $password;
    protected $username;
    protected $roles;

    public function __construct($username, $password, array $roles)
    {
        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;
    }

    public function eraseCredentials()
    {

    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getSalt()
    {
        return '';
    }

    public function getUsername()
    {
        return $this->username;
    }
}