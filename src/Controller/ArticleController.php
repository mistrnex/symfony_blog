<?php

namespace App\Controller;

use App\Entity\Article;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller {
    /**
     * @Route("/", name="article_list")
     * @Method({"GET"})
     * @return Response
     */
    public function index () {

        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();

        return $this->render('articles/index.html.twig', array('articles' => $articles));
    }

    /**
     * @Route("/article/{id}", name="article_show")
     */

    public function view($id) {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        return $this->render('articles/view.html.twig', array('article' => $article));
    }

    // saving by get request

//    /**
//     * @Route("/article/save")
//     */
//    public function save() {
//        $entityManager = $this->getDoctrine()->getmanager();
//
//        $article = new Article();
//        $article->setTitle('Article Two');
//        $article->setBody('Article two - Bla bla how are you?');
//
//        $entityManager->persist($article);
//
//        $entityManager->flush();
//
//        return new Response('Saved an article with the id of ' . $article->getId());
//    }
}
