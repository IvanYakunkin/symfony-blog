<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;

class ArticleController extends AbstractController
{   

    private $mainPagePaginateNumber = 2;

    /**
     * @Route("/", name="main_page")
     */
    public function mainPage(ArticleRepository $repository): Response
    {   
        
        // Get all visible articles
        $articles = $repository->findByStatusId(1);
    
        return $this->render('main.html.twig', [
            'articles' => $articles,
        ]);
    }
    /**
     * @Route("/page/{pageNumber}", name="main_page_paginate")
     */
    public function mainPagePaginate(ArticleRepository $repository, $pageNumber): Response
    {   
        

        $articles = $repository->findByStatusId(1);
        dump($articles);
        // return $this->render('.main.html.twig', [
        //     'articles' => $articles,
        // ])
        
    }

}
