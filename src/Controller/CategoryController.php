<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

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
    public function show(string $slug, CategoryPageServiceInterface $service): Response
    {
        try {
            $currentCategory = $service->getCategoryBySlug($slug);
        } catch (\LogicException $e) {
            throw $this->createNotFoundException($e->getMessage());
        }

        $posts = $service->getPosts($currentCategory);
        $categories = $service->getCategories();

        return $this->render('category/show.html.twig', [
            'categories' => $categories,
            'posts' => $posts,
            'currentCategory' => $currentCategory
        ]);
    }
}
