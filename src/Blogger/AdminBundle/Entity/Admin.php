<?php
namespace Blogger\AdminBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Admin
{
    /**
     * @Assert\NotBlank(message="A felhasználó neve nem lehet üres!")
     */
    public $username;

    /**
     * @Assert\NotBlank()
     */
    public $userpass;

    public function setUserName($name)
    {
        $this->username = $name;
    }

    public function setUserPass($pass)
    {
        $this->userpass = $pass;
    }
}