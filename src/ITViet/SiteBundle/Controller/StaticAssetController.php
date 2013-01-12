<?php

namespace ITViet\SiteBundle\Controller;
use ITViet\SiteBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Response;

class StaticAssetController extends BaseController
{

    public function showJsAction($name)
    {
        $content = $this->renderView('ITVietSiteBundle:StaticAsset:'.$name.'.js.twig');
        $res = new Response($content, 200);
        $res->setSharedMaxAge(600);
        $res->setPublic();
        $res->setEtag(md5($content));
        return $res;
    }
}
