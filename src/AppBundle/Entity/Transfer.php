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
 * @ORM\Table(name="transfer")
 */

class Transfer
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
     * @var \AppBundle\Entity\Nomenclature
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Nomenclature")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nomenclid", referencedColumnName="id")
     * })
     */
    private $nomenclid;


    /**
     * @var \AppBundle\Entity\Department
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Department")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departid", referencedColumnName="id")
     * })
     */
    private $departid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transferdescription;



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
     * Set transferDescription
     *
     * @param string $transferDescription
     *
     * @return Transfer
     */
    public function setTransferDescription($transferDescription)
    {
        $this->transferdescription = $transferDescription;

        return $this;
    }

    /**
     * Get transferDescription
     *
     * @return string
     */
    public function getTransferDescription()
    {
        return $this->transferdescription;
    }

    /**
     * Set nomenclid
     *
     * @param \AppBundle\Entity\Nomenclature $nomenclid
     *
     * @return Transfer
     */
    public function setNomenclid(\AppBundle\Entity\Nomenclature $nomenclid = null)
    {
        $this->nomenclid = $nomenclid;

        return $this;
    }

    /**
     * Get nomenclid
     *
     * @return \AppBundle\Entity\Nomenclature
     */
    public function getNomenclid()
    {
        return $this->nomenclid;
    }

    /**
     * Set departid
     *
     * @param \AppBundle\Entity\Department $departid
     *
     * @return Transfer
     */
    public function setDepartid(\AppBundle\Entity\Department $departid = null)
    {
        $this->departid = $departid;

        return $this;
    }

    /**
     * Get departid
     *
     * @return \AppBundle\Entity\Department
     */
    public function getDepartid()
    {
        return $this->departid;
    }
}
