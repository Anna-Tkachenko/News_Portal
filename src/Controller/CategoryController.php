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
        return $this->render('Category/category.html.twig', ['title' => ucfirst($slug), 'posts' => $posts]);
    }
}