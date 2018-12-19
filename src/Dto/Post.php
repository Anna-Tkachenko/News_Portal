<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Dto;

/**
 * Data transfer object for Post entity.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class Post
{
    private $image;
    private $description;
    private $publicationDate;
    public function __construct(string $description, \DateTimeInterface $publicationDate)
    {
        $this->description = $description;
        $this->publicationDate = $publicationDate;
    }
    public function setImage(string $src): void
    {
        $this->image = $src;
    }
    public function getImage(): string
    {
        return $this->image ?? 'default.png';
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPublicationDate(): string
    {
        return $this->publicationDate->format('d-m-Y');
    }
}
