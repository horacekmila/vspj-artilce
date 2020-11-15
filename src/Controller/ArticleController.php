<?php


namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Service\ArticleService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ArticleController
 * @package App\Controller
 * @Route("article", name="app_articles")
 */
class ArticleController extends AbstractController
{
    private $articleRepository;

    private $articleService;

    private $article;

    public function __construct(ArticleRepository $articleRepository, ArticleService $articleService)
    {
        $this->articleRepository = $articleRepository;
        $this->articleService = $articleService;
        $this->article = $articleRepository;
    }

    /**
     * @Route("/list", name="app_articles_list")
     * @return Response
     */
    public function list(): Response
    {
        $assignedArticles = $this->articleService->getAssignedArticles($this->getUser());
        $otherArticles = $this->articleService->getArticlesExcluding($assignedArticles);

        return $this->render("article/article.list.html.twig", [
            "assignedArticles" => $assignedArticles,
            "otherArticles" => $otherArticles
        ]);
    }

    /**
     * @Route("/list/{id}", name="article_view")
     */
    public function view($id)
    {
        $article = $this->article
            ->find($id);

        if (!$article) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        return $this->render('article/article.view.html.twig', [
            'article' => $article
        ]);

    }
}