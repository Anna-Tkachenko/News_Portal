<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 1/13/19
 * Time: 9:14 PM
 */

namespace App\Controller\Api;

use App\Exception\EntityNotFoundException;
use App\Service\Post\PostServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $response = $this->service->create($request->request->get('data'));

        return $this->view($response, Response::HTTP_CREATED);
    }

    /**
     * @Rest\Get("/post/{id}")
     */
    public function getPost(int $id)
    {
        $response = $this->service->findPost($id);

        return $this->view($response, Response::HTTP_OK);
    }

    /**
     * @Rest\Delete("/post/{id}")
     */
    public function deletePost(int $id)
    {
        try{
            $this->service->delete($id);
        } catch (EntityNotFoundException $e){
            throw new NotFoundHttpException(\sprintf('Post with ID %d not found', $id));
        }

        return $this->view([], Response::HTTP_NO_CONTENT);
    }

    /**
     * @Rest\Patch("/post/{id}")
     */
    public function patchPost(int $id, Request $request)
    {
        $response = $this->service->update($id, $request->request->get('data'));

        return $this->view($response, Response::HTTP_OK);
    }

    /**
     * @Rest\Get("/posts")
     */
    public function getPosts()
    {
        $response = $this->service->findAllPosts();

        return $this->view($response, Response::HTTP_OK);
    }

}