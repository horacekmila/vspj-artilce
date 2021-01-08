<?php


namespace App\Controller;

use App\Entity\Article;
use App\Entity\User;
use App\Enum\StateEnums;
use App\Repository\ArticleRepository;
use App\Repository\StateRepository;
use App\Repository\UserRepository;
use App\Service\ArticleService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ArticleType;

/**
 * Class ArticleController
 * @package App\Controller
 * @Route("article")
 * @Route("article")
 */
class ArticleController extends AbstractController
{
    private StateRepository $stateRepository;

    private EntityManagerInterface $entityManager;

    private ArticleRepository $articleRepository;

    private ArticleService $articleService;

    private UserRepository $userRepository;

    public function __construct(
        ArticleRepository $articleRepository,
        ArticleService $articleService,
        StateRepository $stateRepository,
        EntityManagerInterface $entityManager,
        UserRepository $userRepository
    ) {
        $this->articleRepository = $articleRepository;
        $this->articleService = $articleService;
        $this->stateRepository = $stateRepository;
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/list", name="articles_list")
     * @return Response
     */
    public function list(): Response
    {
        $assignedArticles = $this->articleService->getArticlesByRole($this->getUser());
        $otherArticles = $this->articleService->getArticlesExclude($assignedArticles);

        return $this->render("article/article.list.html.twig", [
            "assignedArticles" => $assignedArticles,
            "otherArticles" => $otherArticles
        ]);
    }

    /**
     * @Route("/view/{article}", name="article_view")
     * @param Article $article
     * @return Response
     */
    public function view(Article $article)
    {
        return $this->render('article/article.view.html.twig', [
            'article' => $article
        ]);
    }

    /**
     * @Route("/list/{article}/edit", name="article_edit")
     * @param Article $article
     * @param Request $request
     * @return Response
     */
    public function edit(Article $article, Request $request)
    {
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $article = $form->getData();
            $this->entityManager->persist($article);
            $this->entityManager->flush();

            $this->addFlash('success', 'Article Edited!');

            return $this->redirectToRoute('articles_list');
        }

        return $this->render('article/article.edit.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/list/{article}/submit", name="article_submit")
     * @param Article $article
     * @return Response
     */
    public function submit(Article $article)
    {
        $submittedState = $this->stateRepository->findOneBy(["name" => StateEnums::SUBMITTED]);
        $article
            ->setState($submittedState)
            ->setAssigne(null);

        $this->entityManager->flush();
        return $this->redirectToRoute('articles_list');
    }

    /**
     * @Route("/list/{article}/return", name="article_return")
     * @param Article $article
     * @return Response
     */
    public function returnToWriter(Article $article)
    {
        $submittedState = $this->stateRepository->findOneBy(["name" => StateEnums::INAPPROPRIAT_THEME]);
        $article
            ->setState($submittedState)
            ->setAssigne($this->userRepository->find(2));

        $this->entityManager->flush();
        return $this->redirectToRoute('articles_list');
    }

    /**
     * @Route("/list/{article}/public", name="article_public")
     * @param Article $article
     * @return Response
     */
    public function public(Article $article)
    {
        $submittedState = $this->stateRepository->findOneBy(["name" => StateEnums::SENT]);
        $article
            ->setState($submittedState)
            ->setIsActive(true);

        $this->entityManager->flush();
        return $this->redirectToRoute('articles_list');
    }

    /**
     * @Route("/list/{article}/submit/review", name="article_submit_to_review")
     * @param Article $article
     * @return Response
     */
    public function review(Article $article)
    {
        $submittedState = $this->stateRepository->findOneBy(["name" => StateEnums::IN_REVIEW]);
        $article
            ->setState($submittedState)
            ->setAssigne($this->userRepository->find(6));

        $this->entityManager->flush();
        return $this->redirectToRoute('articles_list');
    }
    /**
     * @Route("/list/{article}/delete", name="article_delete")
     * @param Article $article
     * @return Response
     */
    public function delete(Article $article)
    {
        $this->entityManager->remove($article);
        $this->entityManager->flush();
        return $this->redirectToRoute('articles_list');
    }

    /**
     * @Route("/new", name="article_new")
     * @param Request $request
     * @param StateRepository $states
     * @return Response
     */
    public function new(Request $request, StateRepository $states)
    {
        $states = $this->stateRepository->findAll();
        $stateArray = [];
        foreach($states as $state) {
            $stateArray[$state->getName()] = $state;
        }
        /** @var User $user */
        $user = $this->getUser();

        $newArticle = (new Article())
            ->setTitle('')
            ->setContent('')
            ->setAssigne($user)
            ->setState($stateArray[StateEnums::WORK_IN_PROGRESS])
            ->setIsActive(false)
            ->setEditable(true)
            ->setVersion(1)
            ->setCreatedBy($user);

        $form = $this->createForm(ArticleType::class, $newArticle);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $newArticle = $form->getData();
            $this->entityManager->persist($newArticle);
            $this->entityManager->flush();

            $this->addFlash('success', 'Article Edited!');

            return $this->redirectToRoute('articles_list');
        }

        return $this->render('article/article.edit.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}