<?php

namespace ITViet\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use ITViet\SiteBundle\Model\CharConverter;

/**
 * ITViet\SiteBundle\Entity\Member
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ITViet\SiteBundle\Repository\MemberRepository")
 */
class Member
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
     * @var boolean $isDeleted
     *
     * @ORM\Column(name="isDeleted", type="boolean")
     */
    private $isDeleted = false;

    /**
     * @var string $fullName
     *
     * @ORM\Column(name="fullName", type="string", length=100)
     */
    private $fullName;

    /**
     * @var string $fullNameInAscii
     *
     * @ORM\Column(name="fullNameInAscii", type="string", length=100, nullable=true)
     */
    private $fullNameInAscii;

    /**
     * @var string $gender
     *
     * @ORM\Column(name="gender", type="string", length=1)
     */
    private $gender;

    /**
     * @var date $birthDate
     *
     * @ORM\Column(name="birthDate", type="date")
     */
    private $birthDate;

    /**
     * @var string $address
     *
     * @ORM\Column(name="address", type="string", length=200, nullable=true)
     */
    private $address;

    /**
     * @var string $addressInAscii
     *
     * @ORM\Column(name="addressInAscii", type="string", length=200, nullable=true)
     */
    private $addressInAscii;

    /**
     * @var string $image
     *
     * @ORM\Column(name="image", type="string", length=200, nullable=true)
     */
    private $image;

    /**
     * @var boolean $isSpecial
     *
     * @ORM\Column(name="isSpecial", type="boolean")
     */
    private $isSpecial = false;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string $hashedPassword
     *
     * @ORM\Column(name="hashedPassword", type="string", length=200)
     */
    private $hashedPassword;

    /**
     * @var string $salt
     *
     * @ORM\Column(name="salt", type="string", length=200)
     */
    private $salt;

    /**
     * @var boolean $enabled
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var string $confirmationToken
     *
     * @ORM\Column(name="confirmationToken", type="string", length=200)
     */
    private $confirmationToken;

    /**
     * @var datetime $passwordRequestedAt
     *
     * @ORM\Column(name="passwordRequestedAt", type="datetime", nullable=true)
     */
    private $passwordRequestedAt;

    /**
     * @var datetime $emailChangeRequestedAt
     *
     * @ORM\Column(name="emailChangeRequestedAt", type="datetime", nullable=true)
     */
    private $emailChangeRequestedAt;

    /**
     * @var boolean $locked
     *
     * @ORM\Column(name="locked", type="boolean")
     */
    private $locked;

    /**
     * @var datetime $since
     *
     * @ORM\Column(name="since", type="datetime", nullable=true)
     */
    private $since;


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
     * Set fullName
     *
     * @param string $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * Get fullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set fullNameInAscii
     *
     * @param string $fullNameInAscii
     */
    public function setFullNameInAscii($fullNameInAscii)
    {
        $this->fullNameInAscii = $fullNameInAscii;
    }

    /**
     * Get fullNameInAscii
     *
     * @return string 
     */
    public function getFullNameInAscii()
    {
        return $this->fullNameInAscii;
    }

    /**
     * Set gender
     *
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthDate
     *
     * @param date $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * Get birthDate
     *
     * @return date 
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set address
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set addressInAscii
     *
     * @param string $addressInAscii
     */
    public function setAddressInAscii($addressInAscii)
    {
        $this->addressInAscii = $addressInAscii;
    }

    /**
     * Get addressInAscii
     *
     * @return string 
     */
    public function getAddressInAscii()
    {
        return $this->addressInAscii;
    }

    /**
     * Set image
     *
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set isSpecial
     *
     * @param boolean $isSpecial
     */
    public function setIsSpecial($isSpecial)
    {
        $this->isSpecial = $isSpecial;
    }

    /**
     * Get isSpecial
     *
     * @return boolean 
     */
    public function getIsSpecial()
    {
        return $this->isSpecial;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set hashedPassword
     *
     * @param string $hashedPassword
    public function setHashedPassword($hashedPassword)
    {
        $this->hashedPassword = $hashedPassword;
    }
     */
    /**
     * Get hashedPassword
     *
     * @return string 
     */
    public function getHashedPassword()
    {
        return $this->hashedPassword;
    }

    /**
     * Set salt
     *
     * @param string $salt
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }
     */

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set confirmationToken
     *
     * @param string $confirmationToken
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;
    }
     */

    /**
     * Get confirmationToken
     *
     * @return string 
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * Set passwordRequestedAt
     *
     * @param datetime $passwordRequestedAt
     */
    public function setPasswordRequestedAt($passwordRequestedAt)
    {
        $this->passwordRequestedAt = $passwordRequestedAt;
    }

    /**
     * Get passwordRequestedAt
     *
     * @return datetime 
     */
    public function getPasswordRequestedAt()
    {
        return $this->passwordRequestedAt;
    }

    /**
     * Set emailChangeRequestedAt
     *
     * @param datetime $emailChangeRequestedAt
     */
    public function setEmailChangeRequestedAt($emailChangeRequestedAt)
    {
        $this->emailChangeRequestedAt = $emailChangeRequestedAt;
    }

    /**
     * Get emailChangeRequestedAt
     *
     * @return datetime 
     */
    public function getEmailChangeRequestedAt()
    {
        return $this->emailChangeRequestedAt;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }

    /**
     * Get locked
     *
     * @return boolean 
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set since
     *
     * @param datetime $since
     */
    public function setSince($since)
    {
        $this->since = $since;
    }

    /**
     * Get since
     *
     * @return datetime 
     */
    public function getSince()
    {
        return $this->since;
    }


    /**
     * @ORM\OneToOne(targetEntity="MemberLoginInfo", cascade={"all"}, fetch="LAZY")
     * @ORM\JoinColumn(name="login_info_id", referencedColumnName="id")
     */
    private $loginInfo;
    public function setLoginInfo($val)
    {
        $this->loginInfo = $val;
    }

    public function getLoginInfo()
    {
        return $this->loginInfo;
    }


    ////////////////////////////////////////
    
    //virtual field
    public $upimage;

    public function __construct()
    {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->enabled = false;
        $this->locked = false;
    }

    public function getPassword(){
        return $this->getHashedPassword();
    }
    public function setPassword($password){
        $encode = new MessageDigestPasswordEncoder('sha512', true, 10);
        $hashedPassword = $encode->encodePassword($password, $this->getSalt());
        $this->hashedPassword = $hashedPassword;
    }

    protected function generateToken(){
        $bytes = false;
        if (function_exists('openssl_random_pseudo_bytes') && 0 !== stripos(PHP_OS, 'win')){
            $bytes = openssl_random_pseudo_bytes(32, $strong);
            if (true !== $strong) {
                $bytes = false;
            }
        }

        if (false === $bytes) {
            $bytes = hash('sha256',microtime(), true);
        }

        return base_convert(bin2hex($bytes), 16, 36).time();
    }

    public function generateConfirmationToken(){
        $this->confirmationToken = $this->generateToken();
    }

    public function updateMetaInfo(){
        $this->fullNameInAscii = $this->getSearchableInAscii($this->fullName);
        $this->addressInAscii = $this->getSearchableInAscii($this->address);
    }

    private function getSearchableInAscii($str){
        $str = str_replace("\n", ' ', $str);
        $str = preg_replace('/[\s\n]{2,}/', ' ', $str);
        $str = trim($str);

        $searchableInVn = strtolower($str);
        $charConv = new CharConverter();
        return $charConv->toPlainLatin($searchableInVn);
    }

    public function isEnable(){
        return $this->enabled;
    }

}
