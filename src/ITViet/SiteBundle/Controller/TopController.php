<?php

namespace ITViet\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TopController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('ITVietSiteBundle:Top:index.html.twig');
    }
}
