<?php

namespace HR\Bundle\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SecurityController extends Controller
{
    /**
     * @Template()
     */
    public function loginAction(Request $request)
    {
        $this->get('breadcrumb')->add('登录');

        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return array(
            'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        );
    }

    public function loginCheckAction()
    {
        // The security layer will intercept this request
    }

    public function logoutAction()
    {
        // The security layer will intercept this request
    }
}