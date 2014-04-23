<?php
/**
 * This file is part of the Oxyfony UI Bundle
 *
 * (c) 2014 Oxyfony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace O2\Bundle\UIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Oxygen UI Bundle Default Controller
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class DefaultController extends Controller
{
	/**
	 * Oxygen UI Bundle Homepage Controller
	 * 
	 * @param string $name
	 */
    public function indexAction($name = 'Outremerbox')
    {
        return $this->render('O2UIBundle:Default:index.html.twig', array('name' => $name));
    }
}
