<?php

namespace App\Controller;

use App\Repository\SiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Site;
use App\Form\AjouterSiteType;

class AdminController extends AbstractController
{
    #[Route('/afficher/sites', name: 'afficher_sites')]
    public function afficherSites(SiteRepository $siteRepository): Response
    {
        $sites = $siteRepository->findAll();

        return $this->render('admin/afficherSites.html.twig', [
            'sites' => $sites
        ]);
    }

    #[Route('/ajouter/site', name: 'ajouter_site')]
    public function ajouterSite(Request $request, ManagerRegistry $doctrine): Response
    {
        $unSite = new Site();

        $form = $this->createForm(AjouterSiteType::class, $unSite);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $doctrine->getManager();
            $em->persist($unSite);
            $em->flush();

            return new Response('Le nouveau site a été enregistré');
        }

        return $this->render('admin/ajouterSite.html.twig', [
            'form' => $form->createView()
        ]);
    }
}