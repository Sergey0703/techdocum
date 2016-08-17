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
 * @ORM\Table(name="department", indexes={@ORM\Index(name="name", columns={"depart_name"})})
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
    private $depart_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $depart_description;


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
     * Set depart_name
     *
     * @param string $depart_name
     *
     * @return Department
     */
    public function setDepart_name($depart_name)
    {
        $this->depart_name = $depart_name;

        return $this;
    }

    /**
     * Get depart_name
     *
     * @return string
     */
    public function getDepart_name()
    {
        return $this->depart_name;
    }

    /**
     * Set depart_description
     *
     * @param string $depart_description
     *
     * @return Department
     */
    public function setDepart_description($depart_description)
    {
        $this->depart_description = $depart_description;

        return $this;
    }

    /**
     * Get depart_description
     *
     * @return string
     */
    public function getDepart_description()
    {
        return $this->depart_description;
    }
}
