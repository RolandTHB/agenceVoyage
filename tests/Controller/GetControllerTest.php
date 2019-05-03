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
}
?>