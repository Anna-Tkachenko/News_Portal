<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 1/13/19
 * Time: 10:46 PM
 */

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post/{slug}", name="post")
     */
    public function index(Post $post)
    {
        return $this->render('post/index.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @Route("/post/{id}/like", name="post_like")
     */
    public function xhrLike(Post $post)
    {
        return $this->json([
            'count' => \mt_rand(10, 100),
        ]);
    }
}