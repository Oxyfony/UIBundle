<?php
/**
 * This file is part of the Oxyfony UI Bundle
 *
 * (c) 2014 Oxyfony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace O2\Bundle\UIBundle\Twig\Extension;

/**
 * Oxygen UI Bundle Twig Form Extension
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class FormExtension extends \Twig_Extension
{
	/**
	 * (non-PHPdoc)
	 * @see Twig_Extension::getFunctions()
	 */
	public function getFunctions()
	{
		return array(
			'checkbox_row' => new \Twig_Function_Node('Symfony\Bridge\Twig\Node\SearchAndRenderBlockNode', array('is_safe' => array('html'))),
			'radio_row' => new \Twig_Function_Node('Symfony\Bridge\Twig\Node\SearchAndRenderBlockNode', array('is_safe' => array('html')))
		);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Twig_ExtensionInterface::getName()
	 */
	public function getName()
	{
		return 'o2_ui_form_extension';
	}
}