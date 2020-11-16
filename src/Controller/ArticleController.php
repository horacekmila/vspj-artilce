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
 * @Route("article", name="articles")
 */
class ArticleController extends AbstractController
{
    /**@var ArticleRepository */
    private $articleRepository;

    /** @var ArticleService */
    private $articleService;

    public function __construct(ArticleRepository $articleRepository, ArticleService $articleService)
    {
        $this->articleRepository = $articleRepository;
        $this->articleService = $articleService;
    }

    /**
     * @Route("/list", name="articles_list")
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
     * @Route("/view/{article}", name="article_view")
     */
    public function view(Article $article)
    {
        return $this->render('article/article.view.html.twig', [
            'article' => $article
        ]);
    }
}