<?php
/**
 * This file is part of the Oxyfony UI Bundle
 *
 * (c) 2014 Oxyfony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace O2\Bundle\UIBundle\Tests;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use O2\Bundle\UIBundle\O2UIBundle;

/**
 * O2 UI Bundle Unit Test
 *  
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class O2UIBundleTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Registering test
	 */
	public function testRegistering()
	{
		$container = new ContainerBuilder();
		$bundle = new O2UIBundle();
		$bundle->boot();
		$bundle->build($container);
		$bundle->shutdown();
	}
}