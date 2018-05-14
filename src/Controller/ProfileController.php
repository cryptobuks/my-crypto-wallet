<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class ProfileController extends Controller
{
    /**
     * @Route("/profile", name="profile")
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('Profile/index.html.twig');
    }
}
