<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository\Post;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }

    /**
     * Finds all posts with related categories.
     *
     * @return Post[]
     */
    public function findAllWithCategories()
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.category', 'c')
            ->addSelect('c')
            ->getQuery()
            ->getResult()
            ;
    }

    public function findAllIsPublished()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.publicationDate IS NOT NULL')
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByCategory(string $categoryName)
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.category', 'c')
            ->andWhere('c.name = :name')
            ->andWhere('p.publicationDate IS NOT NULL')
            ->setParameters([
                'name' => $categoryName
            ])
            ->getQuery()
            ->getResult()
            ;
    }
}
