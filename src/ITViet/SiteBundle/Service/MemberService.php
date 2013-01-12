<?php
namespace ITViet\SiteBundle\Service
use ITViet\SiteBundle\Model\MemberModel;

class MemberService
{
    public function __construct($siteEm, $loggerEm, $securityContext)
    {
        $this->siteEm = $siteEm;
        $this->loggerEm = $loggerEm;
        $this->securityContext = $securityContext;

        $this->repos = $siteEm->getRepository('ITVietSiteBundle:Member');
    }
}
