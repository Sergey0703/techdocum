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
 * @ORM\Table(name="nomenclature",indexes={@ORM\Index(name="namenomenclature", columns={"nomenclname"}),@ORM\Index(name="fk_nomenclature_dep_idx", columns={"departid"})})
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
     *   @ORM\JoinColumn(name="departid", referencedColumnName="id")
     * })
*/

    private $departid;


    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomenclname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomencldescription;


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
     * Set nomenclname
     *
     * @param string $nomenclname
     *
     * @return Department
     */
    public function setNomenclname($nomenclname)
    {
        $this->nomenclname = $nomenclname;

        return $this;
    }

    /**
     * Get nomenclname
     *
     * @return string
     */
    public function getNomenclname()
    {
        return $this->nomenclname;
    }

    /**
     * Set nomencldescription
     *
     * @param string $nomencldescription
     *
     * @return Department
     */
    public function setNomencldescription($nomencldescription)
    {
        $this->nomencldescription = $nomencldescription;

        return $this;
    }

    /**
     * Get nomencldescription
     *
     * @return string
     */
    public function getNomencldescription()
    {
        return $this->nomencldescription;
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
