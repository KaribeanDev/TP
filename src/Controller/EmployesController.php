<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Form\EmployesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployesController extends AbstractController
{

    /**
     * Controller formulaire création salarié
     *
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
    #[Route('/employes/new', name: 'app_employes', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $manager
    ): Response {

        $employes = new Employes();
        $form = $this->createForm(EmployesType::class, $employes);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $employes = $form->getData();
            $manager->persist($employes);
            $manager->flush();


            $this->addFlash(
                'success',
                'Le salarié a été ajouté avec succès !'



            );
            return $this->redirectToRoute('app_entree');
        }



        return $this->render('employes/new.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * Controller modification salarié
     */
    #[Route('/employes/edit/{id}', name: 'app_edit', methods: ['GET', 'POST'])]
    public function edit(
        Employes $employes,
        Request $request,
        EntityManagerInterface $manager
    ): Response {

        $form = $this->createForm(EmployesType::class, $employes);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $employes = $form->getData();

            $manager->persist($employes);
            $manager->flush();

            $this->addFlash(
                'success',
                'Les informations salarié ont été modifiées avec succès !'
            );
            return $this->redirectToRoute('app_entree');
        }
        return $this->render('employes/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

/**
 * Controller suppression salarié
 */
    #[Route('/employes/delete/{id}', name: 'app_delete', methods: ['GET'])]
    public function delete(EntityManagerInterface $manager, Employes $employes): Response
    {
        $manager->remove($employes);
        $manager->flush();
        $this->addFlash(
            'success',
            'Le salarié a bien été supprimé !'
        );


        return $this->redirectToRoute('app_entree');
    }
}
