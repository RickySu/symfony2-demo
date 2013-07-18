<?php
namespace Ricky\Bundle\TestBundle\Security\User;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class MyUserProvider implements UserProviderInterface
{
    protected $users = array(
        'ricky' => array(
            'password' => 'rickypass',
            'roles' => array(
                'ROLE_RICKY'
            ),
        ),
        'admin2' => array(
            'password' => 'adminpass',
            'roles' => array(
                'ROLE_SUPER_ADMIN'
            ),
        ),
    );

    public function loadUserByUsername($username)
    {
        if(!isset($this->users[$username])){
            throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $username));
        }

        return new MyUser($username, $this->users[$username]['password'], $this->users[$username]['roles']);
    }

    public function refreshUser(UserInterface $user)
    {
        if(! $user instanceof MyUser){
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }
        return $user;
    }

    public function supportsClass($class)
    {
        return true;
    }
}
