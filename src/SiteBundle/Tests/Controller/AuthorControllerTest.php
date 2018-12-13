<?php

namespace SiteBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthorControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/author');
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/author/create');
    }

}
