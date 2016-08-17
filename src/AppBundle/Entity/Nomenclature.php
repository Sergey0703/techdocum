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
 * @ORM\Table(name="nomenclature",indexes={@ORM\Index(name="namenomenclature", columns={"nomenc_lname"}),@ORM\Index(name="fk_nomenclature_dep_idx", columns={"departid"})})
 */

class Nomenclature
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Department
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Department")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="name", referencedColumnName="id")
     * })
     */
    private $departid;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomencl_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomencl_description;


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
     * Set nomencl_name
     *
     * @param string $nomencl_name
     *
     * @return Department
     */
    public function setNomencl_name($nomencl_name)
    {
        $this->nomencl_name = $nomencl_name;

        return $this;
    }

    /**
     * Get nomencl_name
     *
     * @return string
     */
    public function getNomencl_name()
    {
        return $this->nomencl_name;
    }

    /**
     * Set nomencl_description
     *
     * @param string $nomencl_description
     *
     * @return Department
     */
    public function setNomencl_description($nomencl_description)
    {
        $this->nomencl_description = $nomencl_description;

        return $this;
    }

    /**
     * Get nomencl_description
     *
     * @return string
     */
    public function getNomencl_description()
    {
        return $this->nomencl_description;
    }

    /**
     * Set departid
     *
     * @param integer $departid
     *
     * @return Nomenclature
     */
    public function setDepartid($departid)
    {
        $this->departid = $departid;

        return $this;
    }

    /**
     * Get departid
     *
     * @return integer
     */
    public function getDepartid()
    {
        return $this->departid;
    }
}
