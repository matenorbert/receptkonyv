<?php
namespace Blogger\AdminBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Receipt
{
    /**
     * @Assert\NotBlank()
     */
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}