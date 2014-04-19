<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2014 Oxyfony
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */
namespace O2\Bundle\UIBundle\Twig\Extension;

/**
 * Oxygen UI Bundle Twig Badge Extension
 *
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class BadgeExtension extends \Twig_Extension
{
	/**
	 * @var \Twig_Environment
	 */
	protected $twig;
	
	public function __construct($container)
	{
		$this->twig = $container->get('twig');
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Twig_Extension::getFunctions()
	 */
	public function getFunctions()
	{
		$options = array('pre_escape' => 'html', 'is_safe' => array('html'));
		
		return array(
			'o2_badge' => new \Twig_Function_Method($this, 'badgeFunction', $options)
		);
	}
	
	/**
	 * Displaying labels
	 * 
	 * @param string $text Text to display
	 * @return string
	 */
	public function badgeFunction($text)
	{
		
		return sprintf('<span class="badge">%s</span>', $text);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Twig_ExtensionInterface::getName()
	 */
	public function getName()
	{
		return 'o2_ui_badge_extension';
	}
}