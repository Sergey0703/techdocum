<?php
/**
 * Created by PhpStorm.
 * User: admins
 * Date: 8/15/16
 * Time: 11:14 PM
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="department", indexes={@ORM\Index(name="name", columns={"departname"})})
 */

class Department
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $departname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departdescription;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set departname
     *
     * @param string $departname
     *
     * @return Department
     */
    public function setDepartname($departname)
    {
        $this->departname = $departname;

        return $this;
    }

    /**
     * Get departname
     *
     * @return string
     */
    public function getDepartname()
    {
        return $this->departname;
    }

    /**
     * Set departdescription
     *
     * @param string $departdescription
     *
     * @return Department
     */
    public function setDepartdescription($departdescription)
    {
        $this->departdescription = $departdescription;

        return $this;
    }

    /**
     * Get departdescription
     *
     * @return string
     */
    public function getDepartdescription()
    {
        return $this->departdescription;
    }
}
