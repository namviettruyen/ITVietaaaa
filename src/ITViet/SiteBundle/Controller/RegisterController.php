<?php

namespace ITViet\SiteBundle\Controller;
use ITViet\SiteBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ITViet\SiteBundle\Entity\Member;
use ITViet\SiteBundle\Entity\MemberLoginInfo;
use ITViet\SiteBundle\Form\Types\MemberRegisterType;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends BaseController
{
    /**
     * @Template()
     */
    public function newAction()
    {
        $request = $this->get('request');
        $t = $this->get('translator');
        $session = $this->get('session');
        $em = $this->get('doctrine.orm.entity_manager');
        $member = new Member();
        $form = $this->createForm(new MemberRegisterType(), $member);

        $maxUpload = 1;

        if($request->getMethod() == 'POST'){
            $form->bindRequest($request);

            if($form['password']->getData() != $form['retypePassword']->getData())
                $form->addError(new FormError($t->trans('Your retype password is not match')));

            if($form['upimage']->getData()){
                $imgFile = $form['upimage']->getData()->openFile('rb');
                if($imgFile->getSize() > $maxUpload*1024*1024){
                    $form->addError(new FormError($t->trans('Your upload file is larger than %num% MB',array('%num%' => $maxUpload))));
                }else{
                    $member->upimage->move(__DIR__.'/../../../../web/images/upload/member', $member->upimage->getClientOriginalName());
                    $member->setImage($member->upimage->getClientOriginalName());
                }
            }

            if($form->isValid()){
                $member->setSince(new \DateTime());
                $member->generateConfirmationToken();
                $loginInfo = new MemberLoginInfo();
                $loginInfo->setCount(0);
                $member->setLoginInfo($loginInfo);
                $member->updateMetaInfo();
                $email = $member->getEmail();

                //send mail
                $message = \Swift_Message::newInstance()
                  ->setSubject($t->trans('YourRegisterWithITViet'))
                  ->setFrom('nam.luuduc@gmail.com')
                  ->setTo($email)
                  ->setBody($this->renderView(
                    'ITVietSiteBundle:Mail:confirmation.html.twig',array(
                      'member' => $member,
                    )
                  ), 'text/html');
                $this->get('mailer')->send($message);

            }
            $em->persist($member);
            $em->flush();

            $session->set('member_confirmation_email', $member->getEmail());
            return $this->redirect($this->generateMlUrl('_member_check_confirm_email'));
        }

        return array(
          'form' => $form->createView(),
        );
    }


    public function checkEmailAvailabilityAction($email){
        $em = $this->get('doctrine.orm.entity_manager');
        $samePerson = $em->getRepository("ITVietSiteBundle:Member")->findBy(array('email'=>$email));
        $isAvailable = sizeof($samePerson) > 0 ? false : true;

        $res = $this->render(
          'ITVietSiteBundle:Register:checkEmailAvailability.txt.twig', array(
            'email' => $email,
            'isAvailable' => $isAvailable,
          )
        );

        $res->headers->set('Content-Type','text/plain');
        return $res;
    }

    /**
     * @Template()
     */
    public function checkConfirmEmailAction(){
        $session = $this->get('session');
        if ($email = $session->get('member_confirmation_email')) {
            $session->remove('member_confirmation_email');
        }
        return array(
          'email' => $email,
        );
    }

    public function confirmAction($token){
        $em = $this->get('doctrine.orm.entity_manager');
        $member = $em->getRepository('ITVietSiteBundle:Member')->findOneBy(array('confirmationToken'=>$token));
        if ($member) {
            if ($member->isEnable())
                return $this->redirect($this->generateMlUrl('_member_already_confirmed'));

            $member->setEnabled(true);

            $em->persist($member);
            $em->flush();

            return $this->redirect($this->generateMlUrl('_member_confirmed'));
        } else {
            throw $this->createNotFoundException('The comfirm code not exists !');
        }
    }

    /**
     * @Template()
     */
    public function confirmedAction(){
        return array();
    }

    /**
     * @Template()
     */
    public function alreadyConfirmedAction(){
        return array();
    }

}
