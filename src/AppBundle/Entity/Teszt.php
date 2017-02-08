<?php

namespace AppBundle\Entity;

/**
 * Teszt
 */
class Teszt
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $teszt;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set teszt
     *
     * @param string $teszt
     *
     * @return Teszt
     */
    public function setTeszt($teszt)
    {
        $this->teszt = $teszt;

        return $this;
    }

    /**
     * Get teszt
     *
     * @return string
     */
    public function getTeszt()
    {
        return $this->teszt;
    }
}

