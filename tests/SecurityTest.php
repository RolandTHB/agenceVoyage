<?php
namespace App\Tests;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityTest extends WebTestCase
{
    public function register($client)
    {
        $crawler = $client->request('GET', '/en/register');

        $form = $crawler->selectButton('Register')->form();
        $form['registration_form[email]'] = 'test@test.com';
        $form['registration_form[plainPassword]'] = '123456';
        $client->submit($form);
        $client->request('GET', '
        ');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }

//    public function login()
//    {
//
//    }
//
//    public function logout()
//    {
//
//    }
//
//    public function testSecurity()
//    {
//
//    }
}

?>