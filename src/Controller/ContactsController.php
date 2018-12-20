<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ContactsController extends AbstractController
{
    public function index(): Response
    {
        $form = $this->createForm(ContactFormType::class);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            //process data
        }

        return $this->render('contacts/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
