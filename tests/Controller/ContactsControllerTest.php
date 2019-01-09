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

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Address")')->count()
        );

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Phone number")')->count()
        );

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Email")')->count()
        );
    }
}