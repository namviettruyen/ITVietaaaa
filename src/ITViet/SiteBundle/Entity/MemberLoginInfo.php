<?php

namespace ITViet\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ITViet\SiteBundle\Entity\MemberLoginInfo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class MemberLoginInfo
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var datetime $lastLogin
     *
     * @ORM\Column(name="lastLogin", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var datetime $currentLogin
     *
     * @ORM\Column(name="currentLogin", type="datetime", nullable=true)
     */
    private $currentLogin;

    /**
     * @var integer $count
     *
     * @ORM\Column(name="count", type="integer")
     */
    private $count;


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
     * Set lastLogin
     *
     * @param datetime $lastLogin
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * Get lastLogin
     *
     * @return datetime 
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set currentLogin
     *
     * @param datetime $currentLogin
     */
    public function setCurrentLogin($currentLogin)
    {
        $this->currentLogin = $currentLogin;
    }

    /**
     * Get currentLogin
     *
     * @return datetime 
     */
    public function getCurrentLogin()
    {
        return $this->currentLogin;
    }

    /**
     * Set count
     *
     * @param integer $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }
}
