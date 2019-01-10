<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 1/9/19
 * Time: 6:25 PM
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactsControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contacts');

        self::assertEquals(200, $client->getResponse()->getStatusCode());

        self::assertCount(1,  $crawler->filter('dt#address'));
        self::assertCount(1,  $crawler->filter('dt#phone'));
        self::assertCount(1,  $crawler->filter('dt#email'));
    }
}