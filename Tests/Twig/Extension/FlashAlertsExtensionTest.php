<?php
/**
 * This file is part of the Oxygen Bundle Package.
 *
 * (c) 2014 Oxyfony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace O2\Bundle\UIBundle\Tests\Twig\Extension;

use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\HttpFoundation\Session\Session;
use O2\Bundle\UIBundle\Twig\Extension\FlashAlertsExtension;
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Bridge\Twig\Tests\Extension\Fixtures\StubTranslator;
use Symfony\Bridge\Twig\Tests\Extension\Fixtures\StubFilesystemLoader;

/**
 * Unit test for FlashAlertsExtension class
 *
 */
class FlashAlertsExtensionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 *
	 * @var FlashAlertsExtension
	 */
	protected $extensionTwig;
	/**
	 *
	 * @var Session
	 */
	protected $session;

	protected function setUp()
	{
		$this->session = new Session(new MockArraySessionStorage());
		$this->extensionTwig = new FlashAlertsExtension($this->session);
		
		// Twig environment
		$loader = new StubFilesystemLoader(array(
			__DIR__.'/../../../Resources/views',
			__DIR__.'/../../../Resources/views/Theming',
		));
		
		$environment = new \Twig_Environment($loader, array('strict_variables' => true));
		$environment->addExtension(new TranslationExtension(new StubTranslator()));
		
		// Simulate app
		$environment->addGlobal('app', array('session' => $this->session));
		
		$this->extensionTwig->initRuntime($environment);
	}
	
	/**
	 * Test class definition
	 */
	public function testClassDefinition() {
		
		$class = new \ReflectionClass('O2\Bundle\UIBundle\Twig\Extension\FlashAlertsExtension');
		
		$methods = array('addError', 'addWarning', 'addSuccess', 'addInfo', 'flashMessages');
		foreach($methods as $method) {
			$this->assertTrue($class->hasMethod($method), sprintf('Class %s does not have method ', $class->getName(), $method));
		}
		
		$this->assertClassHasAttribute('session', $class->getName());
		$this->assertClassHasAttribute('environment', $class->getName());
	}
	
	/**
	 * Test adding alert
	 *
	 * @depends testClassDefinition
	 */
	public function testAddAlert() {
		$this->extensionTwig->addError('Error');
		$this->assertContains('Error', $this->session->getFlashBag()->get('danger', array()));
		
		$this->extensionTwig->addWarning('Warning');
		$this->assertContains('Warning', $this->session->getFlashBag()->get('warning', array()));
		
		$this->extensionTwig->addSuccess('addSuccess');
		$this->assertContains('addSuccess', $this->session->getFlashBag()->get('success', array()));
		
		$this->extensionTwig->addInfo('addInfo');
		$this->assertContains('addInfo', $this->session->getFlashBag()->get('info', array()));
	}
	
	/**
	 * Test adding alert
	 *
	 * @depends testAddAlert
	 */
	public function testRender() {
		
		$this->extensionTwig->addError('Error');
		$this->assertTrue(strpos($this->extensionTwig->flashMessages(), '[trans]Error[/trans]') > 0, 'Error to render flash messages');
	}
	
}
