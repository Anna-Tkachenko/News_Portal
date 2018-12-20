<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Contacts;

final class ContactsPageService implements ContactsPageServiceInterface
{
    private $path;

    public function __construct(string $defaultPath)
    {
        $this->path = $defaultPath;
    }

    public function saveDataToScv($data): void
    {
        if (!file_exists($this->path)) {
            touch($this->path);
        }
        $file = new \SplFileObject($this->path, 'a');
        $file->fputcsv($data);
    }
}
