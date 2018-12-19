<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 12/16/18
 * Time: 11:00 PM
 */

namespace App\Controller;

use App\Service\Home\HomePageServiceInterface;
use App\Service\Category\CategoryPageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Category site controller.
 *
 * @author Anna Tkachenko <tkachenko.anna835@gmail.com>
 */
final class CategoryController extends AbstractController
{

    public function show($slug, CategoryPageServiceInterface $service): Response
    {
        $posts = $service->getPosts();
        try {
            $categoryModel = $service->getCategoryInfo($slug);
        } catch(\LogicException $e){
           throw $this->createNotFoundException('Supported category does not exist');
        }

        return $this->render('category/show.html.twig', [
            'title' => $categoryModel['title'],
            'posts' => $posts,
            'description' => $categoryModel['description']
        ]);
    }
}