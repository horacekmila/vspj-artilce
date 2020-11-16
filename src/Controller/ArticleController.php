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
    // TODO: Use annotation to specify types, e.g. @var ArticleRepository $article
    private $articleRepository;

    private $articleService;

    private $article;

    public function __construct(ArticleRepository $articleRepository, ArticleService $articleService)
    {
        $this->articleRepository = $articleRepository;
        $this->articleService = $articleService;
        // TODO: Why is article = $articleRepository ? Doesn't make sense, keep names the same
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

    // TODO: You can even specify what this have to be and Symfony will fill it up if it's ID of entity, for example:
    // TODO: public function view(Article $article) and then you can work with as object already - do not need to search in database
    /**
     * @Route("/list/{id}", name="article_view")
     */
    public function view($id)
    {
        // TODO: Use what I wrote above and you can delete this
        $article = $this->article
            ->find($id);

        // TODO: Use what I wrote above and you can delete this
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