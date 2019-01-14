<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 1/14/19
 * Time: 12:24 PM
 */

namespace App\Service\Post;


use App\Api\ApiMapperInterface;
use App\Entity\Post;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Post\PostRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class ApiPostService implements PostServiceInterface
{
    private $postRepository;
    private $categoryRepository;
    private $apiMapper;

    public function __construct(
        PostRepositoryInterface $postRepository,
        CategoryRepositoryInterface $categoryRepository,
        ApiMapperInterface $apiMapper
    )
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->apiMapper = $apiMapper;
    }

    public function findPost(int $id)
    {
        $post = $this->postRepository->find($id);
        if (empty($post)) {
            throw new NotFoundHttpException(\sprintf('Post with ID %d not found', $id));
        }
        return $this->apiMapper->entityToResource($post);
    }

    public function create(array $data)
    {
        $category = $this->categoryRepository->findCategoryBySlug($data['category']);

        if (empty($category)) {
            throw new BadRequestHttpException();
        }

        $post = new Post(
            $data['title'],
            $data['body'],
            $data['short_description'],
            $category
        );

        $post->setSlug(
            \strtolower(\str_replace($data['title'], ' ', '-'))
        );

        $this->postRepository->save($post);

        return $this->apiMapper->entityToResource($post);
    }

    public function delete(int $id): void
    {
        $this->postRepository->delete($id);
    }

    public function update(int $id, array $data)
    {
        $post = $this->postRepository->find($id);

        if (isset($data['title'])) {
            $post->setTitle($data['title']);
        }
        if (isset($data['body'])) {
            $post->setBody($data['body']);
        }
        if (isset($data['slug'])) {
            $post->setSlug($data['slug']);
        }
        if (isset($data['short_description'])) {
            $post->setShortDescription($data['short_description']);
        }

        $this->postRepository->save($post);

        return $this->apiMapper->entityToResource($post);
    }

    public function findAllPosts()
    {
        $posts = $this->postRepository->findAll();
        $response = [];

        foreach($posts as $post){
            $response[] = $this->apiMapper->entityToResource($post);
        }

        return $response;
    }


}