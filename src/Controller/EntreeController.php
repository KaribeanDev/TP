<?php

namespace App\Controller;

use App\Repository\EmployesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class EntreeController extends AbstractController
{
    #[Route('/entree', name: 'app_entree')]
    public function index(EmployesRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $employes = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1), 
        6 );

        
        return $this->render('entree/index.html.twig', [
            'employes' => $employes
        ]);
    }
}
