<?php
/**
 * This file is part of the Oxygen UI Package.
 *
 * (c) 2014 Oxyfony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace O2\Bundle\UIBundle\Tests\DependencyInjection;

use O2\Bundle\UIBundle\DependencyInjection\O2UIExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Unit test for O2UIExtension class
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class O2UIExtensionTest extends \PHPUnit_Framework_TestCase
{
	
	private $extension;
	private $container;
	
	protected function setUp()
	{
		$this->extension = new O2UIExtension();
		$this->container = new ContainerBuilder();
		$this->extension->load(array(), $this->container);
		$this->container->registerExtension($this->extension);
	}
	
	public function testIfServicesExist() {
		// List service must exist
		$services = array('o2_ui.twig.flashalerts_extension', 'o2_ui.alerts');
		foreach($services as $service_id) {
			$this->assertTrue($this->container->has($service_id), sprintf("Service %s does not define", $service_id));
		}
	}
	
}
