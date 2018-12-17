<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 12/16/18
 * Time: 8:57 PM
 */

namespace App\Controller;

use App\Service\Home\HomePageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
/**
 * Default site controller.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class DefaultController extends AbstractController
{
    /**
     * Renders home page.
     *
     * @param HomePageServiceInterface $service
     *
     * @return Response
     */
    public function index(HomePageServiceInterface $service): Response
    {
        $posts = $service->getPosts();
        return $this->render('Default/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}