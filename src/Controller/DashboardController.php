<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class DashboardController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('Dashboard/Index.html.twig');
    }
}
