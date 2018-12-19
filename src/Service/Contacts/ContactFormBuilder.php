<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Contacts;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactFormBuilder extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', TextType::class, [
                'attr' => [
                    'placeholder' => 'Name',
                    'class' => 'form-control'
                ],
            ])
            ->add('Email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'form-control'
                ],
            ])
            ->add('Message', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Enter your message..',
                    'class' => 'form-control'
                ],
            ])
            ->add('Send message', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-dark',
                    'label' => 'Send Message'
                ]
            ])
            ->getForm();
    }
}
