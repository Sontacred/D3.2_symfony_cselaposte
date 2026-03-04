<?php

namespace App\Controller;

use App\Repository\SiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/afficher/sites', name: 'afficher_sites')]
    public function afficherSites(SiteRepository $siteRepository): Response
    {
        // Récupérer tous les sites
        $sites = $siteRepository->findAll();

        return $this->render('admin/afficherSites.html.twig', [
            'sites' => $sites,
        ]);
    }
}