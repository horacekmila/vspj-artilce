<?php


namespace App\Controller;


use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    // TODO: Another code-style tip: Write annotation comments on 1 line, e.g. /** @var ArticleRepository */ it looks better :)
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @Route("/dashbord",name="app_dashboard")
     */
    public function index(): Response
    {
        // TODO: To keep MVC architecture, you should move this usage of repository to service :)
        $articles = $this->articleRepository->findAll();
        return $this->render("dashboard.html.twig" , [
            "articles" => $articles
        ]);
    }
}