<?php
namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetControllerTest extends WebTestCase
{
    public function testHomePage()
    {
        $client = static::createClient();
        $client->request('GET', '/en/activite');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testLink()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/en/destinations');
//        $this->assertSame(1, $crawler->filter('a:contains("Voir les articles")')->count());
        $link = $crawler->selectLink('cuba')->link();
        $client->click($link);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }


}
?>