<?php
/**
 * This file is part of the Oxyfony UI Bundle
 *
 * (c) 2014 Oxyfony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace O2\Bundle\UIBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Oxygen UI Bundle Default Controller Tests
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class ThemingControllerTest extends WebTestCase	
{
    public function testComponentTheming()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'ui/component-theming');
        
        // Assert that the response status code is 2xx
        $this->assertTrue($client->getResponse()->isSuccessful());
    }
    
    public function testFormTheming()
    {
    	$client = static::createClient();
    	
    	$crawler = $client->request('GET', 'ui/form-theming');
    	
    	// Assert that the response status code is 2xx
    	$this->assertTrue($client->getResponse()->isSuccessful());
    }
}
