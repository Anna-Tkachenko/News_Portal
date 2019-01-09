<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 1/9/19
 * Time: 7:57 PM
 */

namespace App\Tests\Form;


use App\Form\ContactType;
use Symfony\Component\Form\Test\TypeTestCase;

class ContactTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = array(
            'name' => 'name',
            'email' => 'example@mail.com',
            'message' => 'some text'
        );

        $form = $this->factory->create(ContactType::class);
        $form->submit($formData);
        $this->assertTrue($form->isSynchronized());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}