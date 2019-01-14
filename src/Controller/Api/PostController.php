<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 1/13/19
 * Time: 9:14 PM
 */

namespace App\Controller\Api;

use App\Service\Post\PostServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class PostController extends AbstractFOSRestController
{
    private $service;

    public function __construct(PostServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @Rest\Post("/post")
     */
    public function postPost(Request $request)
    {
        $post = $this->service->create($request->request->get('data'));

        $response = $this->service->getResponse($post);

        return $this->view($response, Response::HTTP_CREATED);
    }

    /**
     * @Rest\Get("/post/{id}")
     */
    public function getPost(int $id)
    {
        $post = $this->service->findPost($id);

        $response = $this->service->getResponse($post);

        return $this->view($response, Response::HTTP_OK);
    }

    /**
     * @Rest\Delete("/post/{id}")
     */
    public function deletePost(int $id)
    {
        $this->service->delete($id);

        return $this->view([], Response::HTTP_NO_CONTENT);
    }

    /**
     * @Rest\Patch("/post/{id}")
     */
    public function patchPost(int $id, Request $request)
    {
        $post = $this->service->update($id, $request->request->get('data'));

        $response = $this->service->getResponse($post);

        return $this->view($response, Response::HTTP_OK);
    }

    /**
     * @Rest\Get("/posts")
     */
    public function getPosts()
    {
        $posts = $this->service->findAllPosts();

        foreach ($posts as $post){
            $response[] = $this->service->getResponse($post);
        }

        return $this->view($response, Response::HTTP_OK);
    }

}