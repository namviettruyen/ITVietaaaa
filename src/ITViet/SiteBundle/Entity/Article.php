<?php

namespace ITViet\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ITViet\SiteBundle\Entity\Article
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Article
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
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string $urlPart
     *
     * @ORM\Column(name="urlPart", type="string", length=255)
     */
    private $urlPart;

    /**
     * @var text $content
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var boolean $isDeleted
     *
     * @ORM\Column(name="isDeleted", type="boolean")
     */
    private $isDeleted = false;

    /**
     * @var boolean $isHot
     *
     * @ORM\Column(name="isHot", type="boolean")
     */
    private $isHot = false;

    /**
     * @var boolean $isActive
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @var datetime $postedAt
     *
     * @ORM\Column(name="postedAt", type="datetime", nullable=true)
     */
    private $postedAt;

    /**
     * @var datetime $modifiedAt
     *
     * @ORM\Column(name="modifiedAt", type="datetime", nullable=true)
     */
    private $modifiedAt;


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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set urlPart
     *
     * @param string $urlPart
     */
    public function setUrlPart($urlPart)
    {
        $this->urlPart = $urlPart;
    }

    /**
     * Get urlPart
     *
     * @return string 
     */
    public function getUrlPart()
    {
        return $this->urlPart;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    }

    /**
     * Get isDeleted
     *
     * @return boolean 
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Set isHot
     *
     * @param boolean $isHot
     */
    public function setIsHot($isHot)
    {
        $this->isHot = $isHot;
    }

    /**
     * Get isHot
     *
     * @return boolean 
     */
    public function getIsHot()
    {
        return $this->isHot;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set postedAt
     *
     * @param datetime $postedAt
     */
    public function setPostedAt($postedAt)
    {
        $this->postedAt = $postedAt;
    }

    /**
     * Get postedAt
     *
     * @return datetime 
     */
    public function getPostedAt()
    {
        return $this->postedAt;
    }

    /**
     * Set modifiedAt
     *
     * @param datetime $modifiedAt
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;
    }

    /**
     * Get modifiedAt
     *
     * @return datetime 
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    public function updateMetaInfo($servContainer) {
        $slugger = $servContainer->get('it_viet_site.url_slugger');
        $slugParams = array('toascii' => true, 'tolower' => true);
        $this->setUrlPart($slugger->slug($this->getTitle(), $slugParams));
    }
}
