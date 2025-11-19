<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ActualitesController extends AbstractController
{
    #[Route('/actualites', name: 'app_actualites')]
    public function index(): Response
    {
        $filePath = __DIR__ . '/../../public/articles/articles.json';

        $articles = json_decode(file_get_contents($filePath), true);

        usort($articles, function ($a, $b) {
            return $b["id"] <=> $a["id"];
        });

        $articlesRecents = array_slice($articles, 0, 3);

        return $this->render('actualites/index.html.twig', [
            'articles' => $articlesRecents
        ]);
    }
}
